<div class="col-9">
    <h1 style="text-align: center">All Board</h1>
    <div class="table-responsive">
        <br />
         <table id="board_data" class="table">
             <thead>
                 <tr>
                     <th >Board Name</th>
                     <th >Modified by</th>
                     <th >Modified At</th>
                     <th >Edit</th>
                     <?php
                     Session::init();
                     if(Session::get('user_role') == 'admin'){?>
                         <th >Delete</th>
                     <?php }?>
                 </tr>
             </thead>
             <tbody>
             <?php foreach ($data['list'] as $key => $value){?>
                 <tr>
                     <td> <span><?php echo $value['name'];?></span></td>
                     <td>
                        <?php

                        foreach ($data['users'] as $k => $v) {
                            if ($v['id'] == $value['modified_by']) {
                                echo $v['full_name'];
                            }
                        }
                        ?>

                     </td>
                     <td><?php echo $value['modified_at'];?></td>
                     <td>
                         <button type="button" name="update" value="<?php echo $value['id']?>" class="btn btn-outline-info my-2 my-sm-0" onclick="btnupdate(this);" >Update</button>
                     </td>
                     <?php
                     Session::init();
                     if(Session::get('user_role') == 'admin'){?>
                     <td>
                         <form action="<?php echo BASE_URL?>/Board/delete" method="post">
                             <button type="submit" name="delete" value="<?php echo $value['id']?>" class="btn btn-outline-danger my-2 my-sm-0" onclick="return confirm('Do u really wanna delete')">Delete</button>
                         </form>
                     </td>
                     <?php }?>
                 </tr>
             <?php }?>
             </tbody>
         </table>
    </div>
    <div>
        <center><button type="button" id="add_button" data-toggle="modal" data-target="#dataModal" class="btn btn-outline-info my-2 my-sm-0" onclick="btnAdd(this);">Add</button></center>
    </div>
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
             <form method="post" id="data_form" enctype="multipart/form-data">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title"><span id="modal_title">Add Board</span></h4>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                         <label for="board_name" id="lbl_board_name">Enter Board Name</label>
                         <input autofocus="true" type="text" name="board_name" id="board_name" class="form-control"  required = "1"/>
                         <br />
                     </div>
                     <div class="modal-footer">
                         <input type="hidden" name="board_id" id="board_id" />
                         <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                     </div>
                 </div>
             </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#board_data').DataTable({
            "columnDefs":[
                {
                    "targets":[3],
                    "orderable":false,
                }
            ]
        });
     });

     function btnupdate(asd) {
         var parent = asd.parentNode.parentNode;
         var btnValue = parent.childNodes[7].childNodes[1].value;
         var name = parent.childNodes[1];
         var nameText = name.childNodes[1].innerText;
         $('#dataModal').modal('show');
         $('#data_form').attr('action','http://localhost/se_addmission/Board/update');
         $('#modal_title').text('Update Board');
         $('#lbl_board_name').text('Update this entry');
         $('#board_name').val(nameText);
         $('#board_id').val(btnValue);
         $('#action').val('Update');
     };

     function btnAdd(asd) {
         $('#dataModal').modal('show');
         $('#data_form').attr('action','http://localhost/se_addmission/Board/addNew');
         $('#modal_title').text('Add Board');
         $('#lbl_board_name').text('Add New Board');
         $('#board_id').val("");
         $('#board_name').val("");
         $('#action').val('Add');
     };

</script>
