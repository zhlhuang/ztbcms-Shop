<include file="Public/min-header"/>
<div class="wrapper"> 
  <include file="Public/breadcrumb"/>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-list"></i> 商品规格</h3>
        </div>
        <div class="panel-body">
          <div class="navbar navbar-default">
              <form action="" id="search-form2" class="navbar-form form-inline" method="post" onsubmit="return false">
                <div class="form-group">
                  <select name="type_id" id="type_id" class="form-control">
                    <option value="">所有分类</option>
                        <foreach name="goodsTypeList" item="v" key="k" >
                           <option value="{$v['id']}">{$v['name']}</option>
			            </foreach>
                   </select>
                </div>
                <div class="form-group">
	                <button type="submit" onclick="ajax_get_table('search-form2',1)" id="button-filter" class="btn btn-primary pull-right">
	                 <i class="fa fa-search"></i> 筛选
	                </button>
                </div> 
                <button type="submit" onclick="location.href='{:U('Spec/addEditSpec')}'" id="button-filter2" class="btn btn-primary pull-right">
                 <i class="fa fa-plus"></i> 添加规格
                </button>                                 
              </form>

          </div>
          <div id="ajax_return"> </div>
        </div>
      </div>
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 
<script>
    $(document).ready(function(){		
		<?php
		    if($_GET['type_id'])
			{
			   echo "$('#type_id').val(".$_GET['type_id'].");"; 
			}
		?>
			$('#button-filter').trigger('click');
    });

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form,page){
		cur_page = page; //当前页面 保存为全局变量
            $.ajax({
                type : "POST",
                url:"/index.php?g=Shop&m=Spec&a=ajaxSpecList&p="+page,//+tab,
                data : $('#'+form).serialize(),// 你的formid
                success: function(data){
                    $("#ajax_return").html('');
                    $("#ajax_return").append(data);
                }
            });
        }			 	
	 
</script> 
</body>
</html>