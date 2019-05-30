<div class="modal userpanel fade" id="userpanel" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#upprof" aria-controls="home" role="tab" data-toggle="pill" draggable="false">
                            <i class="fa fa-edit"></i>
修改 </a>
                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="upprof">
                        <form role="form" method="post" id="usrForm" action="/index.php?">
                            <div class="form-group">
                                <label for="user_new_name">
用户名 </label>
                                <input name="user_old_name" type="hidden" readonly
                                       class="form-control" value="{{$username}}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                    <input name="user_new_name" type="text"
                                           class="form-control" value="admin">
                                </div>
                                <label for="user_new_email">
邮箱 </label>
                                <input name="user_old_email" type="hidden" readonly
                                       class="form-control" value="">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                    <input name="user_new_email" type="text"
                                           class="form-control" value="">
                                </div>
                                <label for="user_new_pass">
重设密码 </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                    <input name="user_new_pass" autocomplete="off" id="newp" type="password"
                                           class="form-control">
                                </div>
                                <label for="user_new_pass_confirm">
重设密码 (确认) </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                    <input name="user_new_pass_confirm" autocomplete="off" id="checknewp"
                                           type="password"
                                           class="form-control">
                                </div>
                                <label for="user_old_pass">
当前密码 </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-unlock fa-fw"></i></span>
                                    <input name="user_old_pass" autocomplete="off" type="password" id="oldp" required
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-refresh"></i>
修改
                                </button>
                            </div>

                        </form>
                    </div> <!-- tabpanel -->
                </div><!-- tab-content -->
            </div> <!-- modal-body -->
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal -->