<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|<?php echo L('_SNS_BACKSTAGE_MANAGE_');?></title>
    <link href="/opencenter/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">


    <!--zui-->
    <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/zui/css/zui.css" media="all">
    <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/ext.css" media="all">
    <!--zui end-->

    <!--
        <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/base.css" media="all">
        <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/common.css" media="all"-->
    <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/module.css">
    <link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/style.css" media="all">
    <!--<link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/opencenter/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/opencenter/Public/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/opencenter/Application/Admin/Static/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
    <script type="text/javascript">
        var ThinkPHP = window.Think = {
            "ROOT": "/opencenter", //当前网站地址
            "APP": "/opencenter/index.php?s=", //当前项目地址
            "PUBLIC": "/opencenter/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINF<?php echo L("_O_SEGMENTATION_");?>
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
            'URL_MODEL': "<?php echo C('URL_MODEL');?>"
        }
        var _ROOT_="/opencenter";
    </script>
</head>
<body>
<style>

</style>
<div class="panel-header">
    <nav class="navbar navbar-inverse admin-bar" role="navigation">
        <div class="navbar-header">
            <a href="<?php echo U('Index/index');?>" class="navbar-brand">
                OpenCenter</a>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-example">
            <ul id="nav_bar" class="nav navbar-nav">
                <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if(($menu["hide"]) != "1"): ?><li data-id="<?php echo ($menu["id"]); ?>" class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (u($menu["url"])); ?>">
                            <?php if(($menu["icon"]) != ""): ?><i class="icon-<?php echo ($menu["icon"]); ?>"></i>&nbsp;<?php endif; ?>
                            <?php echo ($menu["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:;"  onclick="clear_cache()"><i class="icon-trash"></i> <?php echo L('_CACHE_CLEAR_');?></a></li>
                <li><a target="_blank" href="<?php echo U('Home/Index/index');?>"><i class="icon-copy"></i> <?php echo L('_FORESTAGE_OPEN_');?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>
                        <?php echo session('user_auth.username');?> <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo U('User/updatePassword');?>"><?php echo L('_PASSWORD_CHANGE_');?></a></li>
                        <li><a href="<?php echo U('User/updateNickname');?>"><?php echo L('_NICKNAME_CHANGE_');?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Public/logout');?>"><?php echo L('_EXIT_');?></a></li>
                    </ul>
                </li>
                <script>
                    function clear_cache() {
                        var msg = new $.zui.Messager("<?php echo L('_CACHE_CLEAR_SUCCESS_'); echo L('_PERIOD_');?>", {placement: 'bottom'});
                        $.get('/opencenter/cc.php');
                        msg.show()
                    }
                </script>
            </ul>
        </div>
    </nav>

    <div class="admin-title">

    </div>

</div>
<div class="panel-menu">
    <ul class="nav nav-primary nav-stacked">

        <?php if(is_array($__MODULE_MENU__)): $i = 0; $__LIST__ = $__MODULE_MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['is_setup'] AND $v['admin_entry']): ?><li>
                    <a  href="<?php echo U($v['admin_entry']);?>" title="<?php echo (text($v["alias"])); ?>" class="text-ellipsis text-center">
                        <i class="icon-<?php echo ($v['icon']); ?>"></i><br/><?php echo ($v["alias"]); ?>
                    </a>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

    </ul>

</div>

<div class="panel-main" style="float:left;">

    <div class="">


    <div class="clearfix " style="">
        <?php if(!empty($__MENU__["child"])): ?><div class="sub_menu_wrapper" style="background: rgb(245, 246, 247); bottom: -10px;top: 0;position: absolute;width: 180px;overflow: auto">
                <div>
                    <nav id="sub_menu" class="menu" data-toggle="menu">
                        <ul class="nav nav-primary">
                            
                                <!--     <?php if(!empty($_extra_menu)): ?>
                                         <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>-->
                                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- <?php echo L("_SUB_NAVIGATION_");?>-->
                                    <?php if(!empty($sub_menu)): ?><li class="show">
                                            <a href="#">
                                                <?php if(!empty($key)): echo ($key); endif; ?>
                                            </a>
                                            <ul class="nav">
                                                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                                        <a href="<?php echo (u($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </li><?php endif; ?>
                                    <!-- /<?php echo L("_SUB_NAVIGATION_");?>--><?php endforeach; endif; else: echo "" ;endif; ?>

                            

                        </ul>
                    </nav>
                </div>
            </div><?php endif; ?>


        <?php if(!empty($__MENU__["child"])): $col=10; ?>
            <?php else: ?>
            <?php $col=12; endif; ?>
        <div id="main-content" class="" style="padding:10px;padding-left:0;padding-bottom:10px;left: 180px;position:absolute;right: 0;bottom: 0;top: 0;overflow: auto">
           <?php if(($update) == "1"): ?><div id="top-alert" class="alert alert-success alert-dismissable" style="position: absolute;left: 50%;margin-left: -150px;width: 300px;box-shadow: rgba(95, 95, 95, 0.4) 3px 3px 3px;z-index:999">
                   <i class="icon-ok-sign" style="font-size: 28px"></i>  &nbsp;&nbsp; <?php echo L('_VERSION_UPDATE_',array('href'=> '<a class="alert-link" href="'.U('Cloud/update').'">' ));?></a>
                   <button class="close fixed" style="margin-top: 4px;">&times;</button>
               </div><?php endif; ?>

            <div id="main" style="overflow-y:auto;overflow-x:hidden;">
                
                    <!-- nav -->
                    <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                            <span><?php echo L('_YOUR_POSITION_'); echo L('_COLON_');?></span>
                            <?php $i = '1'; ?>
                            <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                                    <?php else: ?>
                                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                                <?php $i = $i+1; endforeach; endif; ?>
                        </div><?php endif; ?>
                    <!-- nav -->
                

                <div class="admin-main-container">
                    
<!-- 标题 -->
    <div class="main-title">
        <h2>
           <?php echo L("_INVITATION_CODE_LIST_PAGE_");?>
        </h2>
    </div>
    </div>
    <!-- 按钮工具栏 -->
    <div class="with-padding">
        <div class="fl">
            <button class="btn ajax-post btn" url="<?php echo U('admin/invite/delete',array('status'=>-1));?>" target-form="ids">
               <?php echo L("_DELETE_");?>
            </button>
            &nbsp;
            <button data-title=<?php echo L("_GENERATE_THE_INVITATION_CODE_WITH_DOUBLE_");?> modal-url="<?php echo U('admin/invite/createcode');?>" data-role="modal_popup" class="btn">
               <?php echo L("_GENERATE_INVITATION_CODE_");?>
            </button>
            &nbsp;
            <button class="btn ajax-post btn" url="<?php echo U('admin/invite/deletetrue',array('status'=>-1));?>" target-form="ids">
               <?php echo L("_EMPTY_THE_USELESS_INVITATION_CODE_");?>
            </button>
            &nbsp;
            <button class="btn" data-role="copy_code_list">
               <?php echo L("_BATCH_COPY_INVITATION_CODE_");?>
            </button>
            &nbsp;
            <button class="btn"  data-role="copy_code_url_list">
               <?php echo L("_BATCH_COPY_INVITATION_LINK_");?>
            </button>
            &nbsp;
            <button class="btn" data-role="cvs" data-url="<?php echo U('admin/invite/cvs');?>">
               <?php echo L("_EXPORT_CVS_");?>
            </button>
            &nbsp;
            <!-- 选择框select -->
            <div style="float: right;">
                <style>
                    .oneselect {
                        display: inline-block;
                        margin-left: 10px;
                    }

                    .oneselect .title {
                        float: left;
                        line-height: 32px;
                    }

                    .oneselect .select_box {
                        float: left;
                        line-height: 32px;
                    }

                    .oneselect .select_box select {
                        min-width: 200px;
                    }
                </style>
                <form id="selectForm" method="get" action="<?php echo U('Admin/Invite/invite');?>" class="form-dont-clear-url-param">
                    <div class="oneselect">
                        <div class="title"><?php echo L("_INVITATION_CODE_TYPE_"); echo L("_COLON_");?></div>
                        <div class="select_box">
                            <select name="type" data-role="select_text" class="form-control">
                                <?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i; if($type['id']==$now_type){ ?>
                                    <option value="<?php echo ($type["id"]); ?>" selected><?php echo ($type["value"]); ?></option>
                                    <?php }else{ ?>
                                    <option value="<?php echo ($type["id"]); ?>"><?php echo ($type["value"]); ?></option>
                                    <?php } endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="oneselect">
                        <div class="select_box">
                            <select name="status" data-role="select_text" class="form-control">
                                <option value="1" selected><?php echo L("_CAN_BE_REGISTERED_");?></option>
                                <option value="3"><?php echo L("_EXPIRED_");?></option>
                                <option value="2"><?php echo L("_REFUND_");?></option>
                                <option value="0"><?php echo L("_INVALID_");?></option>
                                <option value="-1"><?php echo L("_ADMINISTRATOR_DELETE_");?></option>
                            </select>
                        </div>
                    </div>
                    <div class="oneselect">
                        <div class="select_box">
                            <select name="buyer" data-role="select_text" class="form-control">
                                <option value="-1" <?php if(($buyer) == "-1"): ?>selected<?php endif; ?>><?php echo L("_ADMINISTRATOR_GENERATION_");?></option>
                                <option value="1" <?php if(($buyer) == "1"): ?>selected<?php endif; ?>><?php echo L("_USER_PURCHASE_");?></option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- 数据表格 -->
    <div class="with-padding">
        <table class="table table-bordered table-striped ">
            <!-- 表头 -->
            <thead>
            <tr>
                <th class="row-selected row-selected">
                    <input class="check-all" type="checkbox">
                </th>
                <th>ID</th>
                <th><?php echo L("_INVITATION_CODE_");?></th>
                <th style="width: 250px;"><?php echo L("_INVITATION_CODE_LINK_");?></th>
                <th><?php echo L("_INVITATION_CODE_TYPE_");?></th>
                <th><?php echo L("_BUYERS_");?></th>
                <th><?php echo L("_CAN_BE_REGISTERED_A_FEW_");?></th>
                <th><?php echo L("_ALREADY_REGISTERED_SEVERAL_");?></th>
                <th><?php echo L("_PERIOD_OF_VALIDITY_");?></th>
                <th><?php echo L("_CREATE_TIME_");?></th>
                <th><?php echo L("_OPERATION_");?></th>
            </tr>
            </thead>

            <!-- 列表 -->
            <tbody>
            <?php if(is_array($invite_list)): $i = 0; $__LIST__ = $invite_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$invite): $mod = ($i % 2 );++$i;?><tr>
                    <td><input class="ids" type="checkbox" value="<?php echo ($invite["id"]); ?>" name="ids[]" data-code="<?php echo ($invite["code"]); ?>" data-code-url="<?php echo ($invite["code_url"]); ?>"></td>
                    <td><?php echo ($invite["id"]); ?></td>
                    <td><?php echo ($invite["code"]); ?></td>
                    <td><?php echo ($invite["code_url"]); ?></td>
                    <td><?php echo ($invite["invite"]); ?></td>
                    <td><?php echo ($invite["buyer"]); ?></td>
                    <td><?php echo ($invite["can_num"]); ?></td>
                    <td><?php echo ($invite["already_num"]); ?></td>
                    <td><?php echo (time_format($invite["end_time"])); ?></td>
                    <td><?php echo (time_format($invite["create_time"])); ?></td>
                    <td>
                        <div style="position: relative;">
                            <a data-role="copy_code" data-code="<?php echo ($invite["code"]); ?>"><?php echo L("_COPY_INVITATION_CODE_");?></a> <a data-role="copy_code_url" data-code-url="<?php echo ($invite["code_url"]); ?>" style="margin-left: 10px;"><?php echo L("_COPY_INVITATION_LINK_");?></a>
                        </div>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
    </div>
    <!-- 分页 -->
    <div class="with-padding">
        <?php echo ($pagination); ?>
    </div>
    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</div>



<?php if($report){ ?>
<div  class="report_feedback" title="<?php echo L('_REPORT_EXPERIENCE_PLEASE_FILL_');?>" data-toggle="modal" data-target="#myModal">
    <div class="report_icon" ></div>
    <span class="label label-badge label-danger report_point">1</span>
</div>




<div class="modal fade in" id="myModal" aria-hidden="false"  style="display: none">
    <div class="modal-dialog" >
        <div class="modal-content">
            <form class="report_form"  action="<?php echo U('admin/admin/submitReport');?>" method="post">


            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only"><?php echo L('_CLOSE_');?></span></button>
                <h4 class="modal-title"><?php echo L('_REPORT_EXPERIENCE_');?></h4>
            </div>

            <div class="modal-body">

                    <div class="row">
                        <!-- 帖子分类 -->
                        <div class="col-sm-12">
<div><?php echo L('_THANKS_HOPE_');?></div>

                                <label class="item-label"><?php echo L('_MOOD_MY_');?></label>
                            <div>
                                <select name="q1" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <option><?php echo L('_HAPPY_');?></option>
                                    <option><?php echo L('_AGONY_');?></option>
                                    <option><?php echo L('_LOVE_');?></option>
                                    <option><?php echo L('_EXPECT_');?></option>
                                </select>
                        </div>

                                <label class="item-label"><?php echo L('_LOVE_MY_OPTION_');?></label>
                            <div>
                                <select name="q2" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($this_update)): $i = 0; $__LIST__ = $this_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>

                                <label class="item-label"><?php echo L('_HATE_MY_OPTION_');?>
                                </label>
                            <div>
                                <select name="q3" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($this_update)): $i = 0; $__LIST__ = $this_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>


                                <label class="item-label"><?php echo L('_EXPECTATION__MY_OPTION_');?>
                                </label>
                            <div>
                                <select name="q4" class="report-select" style="width:400px;">
                                    <option value="0"><?php echo L('_ELECT_PLEASE_');?></option>
                                    <?php if(is_array($future_update)): $i = 0; $__LIST__ = $future_update;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;?><option value="<?php echo (htmlspecialchars($option)); ?>"><?php echo (htmlspecialchars($option)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <?php if(strval($report['url'])!=''){ ?>
                <a class="pull-left" href="<?php echo ($report['url']); ?>" target="_blank" ><?php echo L('_UPDATE_LOOK_');?></a>
                <?php } ?>
                <button type="submit" class="btn ajax-post" target-form="report_form"><?php echo L('_CONFIRM_');?></button>
            </div>

            </form>
        </div>
    </div>
</div>



<?php } ?>


<script>
    $(function () {
        var config = {
            '.chosen-select'           : {search_contains: true, drop_width: 400,no_results_text:"{:L('_OPTION_MATCHED_NONE_')}"},
            '.report-select'           : {search_contains: true, width: '400px',no_results_text:"{:L('_OPTION_MATCHED_NONE_')}"}
        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

    });
</script>


<script src="/opencenter/Application/Admin/Static/zui/lib/chosen/chosen.js"></script>
<link href="/opencenter/Application/Admin/Static/zui/lib/chosen/chosen.css" type="text/css" rel="stylesheet">




<!-- <?php echo L("_CONTENT_AREA_");?>-->

<!-- /<?php echo L("_CONTENT_AREA_");?>-->
<script type="text/javascript">
    (function () {
        var ThinkPHP = window.Think = {
            "ROOT": "/opencenter", //当前网站地址
            "APP": "/opencenter/index.php?s=", //当前项目地址
            "PUBLIC": "/opencenter/Public", //项目公共目录地址
            "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
            'URL_MODEL': "<?php echo C('URL_MODEL');?>"
        }
    })();
</script>
<script type="text/javascript" src="/opencenter/Public/static/think.js"></script>

<!--zui-->
<script type="text/javascript" src="/opencenter/Application/Admin/Static/js/common.js"></script>
<script type="text/javascript" src="/opencenter/Application/Admin/Static/js/com/com.toast.class.js"></script>
<script type="text/javascript" src="/opencenter/Application/Admin/Static/zui/js/zui.js"></script>
<script type="text/javascript" src="/opencenter/Application/Admin/Static/zui/lib/migrate/migrate1.2.js"></script>
<!--zui end-->
<link rel="stylesheet" type="text/css" href="/opencenter/Application/Admin/Static/js/kanban/kanban.css" media="all">
<script type="text/javascript" src="/opencenter/Application/Admin/Static/js/kanban/kanban.js"></script>
<script type="text/javascript">
    +function () {
        var $window = $(window), $subnav = $("#subnav"), url;
        $window.resize(function () {
            $("#main").css("min-height", $window.height() - 130);
        }).resize();

        // 导航栏超出窗口高度后的模拟滚动条
        var sHeight = $(".sidebar").height();
        var subHeight = $(".subnav").height();
        var diff = subHeight - sHeight; //250
        var sub = $(".subnav");
        if (diff > 0) {
            $(window).mousewheel(function (event, delta) {
                if (delta > 0) {
                    if (parseInt(sub.css('marginTop')) > -10) {
                        sub.css('marginTop', '0px');
                    } else {
                        sub.css('marginTop', '+=' + 10);
                    }
                } else {
                    if (parseInt(sub.css('marginTop')) < '-' + (diff - 10)) {
                        sub.css('marginTop', '-' + (diff - 10));
                    } else {
                        sub.css('marginTop', '-=' + 10);
                    }
                }
            });
        }
    }();
    highlight_subnav("<?php echo U('Admin'.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$_GET);?>")
</script>

    <script type="text/javascript" src="/opencenter/Public/static/thinkbox/jquery.thinkbox.js"></script>
    <script type="text/javascript" src="/opencenter/Public/js/ext/zclip/jquery.zclip.min.js"></script>
    <script type="text/javascript">
        function toggle_search(){
            $('#search_form').toggle('slide');
        }

        $(document).on('submit', '.form-dont-clear-url-param', function(e){
            e.preventDefault();

            var seperator = "&";
            var form = $(this).serialize();
            var action = $(this).attr('action');
            if(action == ''){
                action = location.href;
            }
            var new_location = action + seperator + form;

            location.href = new_location;

            return false;
        });


    </script>
    <script>
        $(function(){
            $('[data-role="copy_code"]').zclip({
                copy: function () {
                    return $(this).attr('data-code');
                },
                afterCopy: function () {
                    $(this).html(<?php echo L('_HAS_BEEN_COPIED_WITH_SINGLE_');?>);
                    toast.success(<?php echo L('_COPY_SUCCESS_WITH_SINGLE_');?>);
                }
            });
            $('[data-role="copy_code_url"]').zclip({
                copy: function () {
                    return $(this).attr('data-code-url');
                },
                afterCopy: function () {
                    $(this).html(<?php echo L('_LINK_HAS_BEEN_COPIED_WITH_SINGLE_');?>);
                    toast.success(<?php echo L('_REPLICATION_LINK_SUCCESS_WITH_SINGLE_');?>);
                }
            });
            $('[data-role="copy_code_list"]').zclip({
                copy: function () {
                    var code_list='';
                    $('.ids').each(function(){
                        if($(this).is(":checked")){
                            code_list+=$(this).attr('data-code')+'\n';
                        }
                    });
                    if(code_list!=''){
                        return code_list;
                    }else{
                        toast.error(<?php echo L('_PLEASE_SELECT_THE_DATA_WITH_SINGLE_');?>);
                    }
                },
                afterCopy: function () {
                    toast.success(<?php echo L('_BATCH_COPY_SUCCESS_WITH_SINGLE_');?>);
                }
            });
            $('[data-role="copy_code_url_list"]').zclip({
                copy: function () {
                    var code_list_url='';
                    $('.ids').each(function(){
                        if($(this).is(":checked")){
                            code_list_url+=$(this).attr('data-code-url')+'\n\n';
                        }
                    });
                    if(code_list_url!=''){
                        return code_list_url;
                    }else{
                        toast.error(<?php echo L('_PLEASE_SELECT_THE_DATA_WITH_SINGLE_');?>);
                    }
                },
                afterCopy: function () {
                    toast.success(<?php echo L('_BATCH_COPY_SUCCESS_WITH_SINGLE_');?>);
                }
            });
            $('[data-role="cvs"]').click(function(){
                var data_url=$(this).attr('data-url');
                var form=$('.ids');
                if (form.get(0) == undefined) {
                } else if (form.get(0).nodeName == 'FORM') {
                    query = form.serialize();
                } else if (form.get(0).nodeName == 'INPUT' || form.get(0).nodeName == 'SELECT' || form.get(0).nodeName == 'TEXTAREA') {
                    query = form.serialize();
                } else {
                    query = form.find('input,select,textarea').serialize();
                }
                data_url+='&'+query;
                window.open(data_url);
            });
            $('[data-role="select_text"]').change(function(){
                $('#selectForm').submit();
            });
            //模态弹窗
            $('[data-role="modal_popup"]').click(function(){
                var target_url=$(this).attr('modal-url');
                var data_title=$(this).attr('data-title');
                var target_form=$(this).attr('target-form');
                if(target_form!=undefined){
                    //设置了参数时，把参数加入
                    var form=$('.'+target_form);

                    if (form.get(0) == undefined) {
                        updateAlert(<?php echo L('_NO_OPERATIONAL_DATA_WITH_SINGLE_');?>,'danger');
                        return false;
                    } else if (form.get(0).nodeName == 'FORM') {
                        query = form.serialize();
                    } else if (form.get(0).nodeName == 'INPUT' || form.get(0).nodeName == 'SELECT' || form.get(0).nodeName == 'TEXTAREA') {
                        query = form.serialize();
                    } else {
                        query = form.find('input,select,textarea').serialize();
                    }
                    if(!query.length){
                        updateAlert(<?php echo L('_NO_OPERATIONAL_DATA_WITH_SINGLE_');?>,'danger');
                        return false;
                    }
                    target_url=target_url+'&'+query;
                }
                var myModalTrigger = new $.zui.ModalTrigger({
                    'type':'ajax',
                    'url':target_url,
                    'title':data_title
                });
                myModalTrigger.show();
            });
            $('.tox-confirm').click(function(e){
                var text = $(this).attr('data-confirm');
                var result = confirm(text);
                if(result) {
                    return true;
                } else {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                    return false;
                }
            })
            //导航高亮
            highlight_subnav("<?php echo U('Invite/invite');?>");
        });
    </script>



</body>
</html>