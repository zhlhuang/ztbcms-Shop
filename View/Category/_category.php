<include file="Public/min-header"/>
<div class="wrapper">
		<section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">增加分类</h3>
			                <div class="pull-right">
			                	<a href="javascript:history.go(-1)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="返回"><i class="fa fa-reply"></i></a>
			                </div>
                        </div>
 
                        <!-- /.box-header -->
                        <form action="{:U('Category/addEditCategory')}" method="post" class="form-horizontal" id="category_form">
                        <div class="box-body">                         
                                <div class="form-group">
                                     <label class="col-sm-2 control-label">分类名称</label>
                                     <div class="col-sm-6">
                                        <input type="text" placeholder="名称" class="form-control large" name="name" value="{$goods_category_info.name}">
                                        <span class="help-inline" style="color:#F00; display:none;" id="err_name"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">手机分类名称</label>
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="手机分类名称" class="form-control large" name="mobile_name" value="{$goods_category_info.mobile_name}">
                                        <span class="help-inline" style="color:#F00; display:none;" id="err_mobile_name"></span>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label0 class="control-label col-sm-2">上级分类</label0>

                                    <div class="col-sm-3">
                                        <select name="parent_id_1" id="parent_id_1" onchange="get_category(this.value,'parent_id_2','0');" class="small form-control">
	                                        <option value="0">顶级分类</option>
                                            <foreach name="cat_list" item="v" >                                            
                                                <option value="{$v[id]}">{$v[name]}</option>
                                            </foreach>                                            
										</select>
                                    </div>                                    
                                    <div class="col-sm-3">
                                      <select name="parent_id_2" id="parent_id_2"  class="small form-control">
                                        <option value="0">请选择商品分类</option>
                                      </select>  
                                    </div>                                      
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">导航显示</label>
									
                                    <div class="col-sm-10">
                                        <label> 
                                            <if condition="($goods_category_info[is_show] eq 1) or ($goods_category_info[is_show] eq NULL)"> 
                                                <input checked="checked" type="radio" name="is_show" value="1"> 是
                                                <input type="radio" name="is_show" value="0"> 否
                                            <else /> 
                                                <input type="radio" name="is_show" value="1"> 是
                                                <input checked="checked" type="radio" name="is_show" value="0"> 否
                                            </if>                                                                                                                                    
                                        </label>
                                    </div>
                                </div>
				<div class="form-group">
                                    <label class="control-label col-sm-2">分类分组:</label>
									
                                    <div class="col-sm-1">
                                      <select name="cat_group" id="cat_group" class="form-control">
                                        <option value="0">0</option>                                        
                                        <option value='1' <if condition="$goods_category_info[cat_group] eq 1"> selected='selected'</if>>1</option>"
                                        <option value='2' <if condition="$goods_category_info[cat_group] eq 2"> selected='selected'</if>>2</option>"
                                        <option value='3' <if condition="$goods_category_info[cat_group] eq 3"> selected='selected'</if>>3</option>"
                                        <option value='4' <if condition="$goods_category_info[cat_group] eq 4"> selected='selected'</if>>4</option>"
                                        <option value='5' <if condition="$goods_category_info[cat_group] eq 5"> selected='selected'</if>>5</option>"
                                        <option value='6' <if condition="$goods_category_info[cat_group] eq 6"> selected='selected'</if>>6</option>"
                                        <option value='7' <if condition="$goods_category_info[cat_group] eq 7"> selected='selected'</if>>7</option>"
                                        <option value='8' <if condition="$goods_category_info[cat_group] eq 8"> selected='selected'</if>>8</option>"
                                        <option value='9' <if condition="$goods_category_info[cat_group] eq 9"> selected='selected'</if>>9</option>"
                                        <option value='10' <if condition="$goods_category_info[cat_group] eq 10"> selected='selected'</if>>10</option>"
                                        <option value='11' <if condition="$goods_category_info[cat_group] eq 11"> selected='selected'</if>>11</option>"
                                        <option value='12' <if condition="$goods_category_info[cat_group] eq 12"> selected='selected'</if>>12</option>"
                                        <option value='13' <if condition="$goods_category_info[cat_group] eq 13"> selected='selected'</if>>13</option>"
                                        <option value='14' <if condition="$goods_category_info[cat_group] eq 14"> selected='selected'</if>>14</option>"
                                        <option value='15' <if condition="$goods_category_info[cat_group] eq 15"> selected='selected'</if>>15</option>"
                                        <option value='16' <if condition="$goods_category_info[cat_group] eq 16"> selected='selected'</if>>16</option>"
                                        <option value='17' <if condition="$goods_category_info[cat_group] eq 17"> selected='selected'</if>>17</option>"
                                        <option value='18' <if condition="$goods_category_info[cat_group] eq 18"> selected='selected'</if>>18</option>"
                                        <option value='19' <if condition="$goods_category_info[cat_group] eq 19"> selected='selected'</if>>19</option>"
                                        <option value='20' <if condition="$goods_category_info[cat_group] eq 20"> selected='selected'</if>>20</option>"
                                      </select>                                        
                                    </div>                                    
                                </div>   
                             
				  <div class="form-group">
	                                    <label class="control-label col-sm-2">分类展示图片</label>

                                    <div class="col-sm-10">
                                        <input class="btn btn-default" onclick="GetUploadify(1,'image','category');" type="button" value="上传图片"/>
                                        <input type="text" value="{$goods_category_info.image}" name="image" id="image" class="form-control large" readonly="readonly"  style="width:500px;display:initial;"/>
                                    </div>
                                </div>                                
                               <div class="form-group">
                                    <label class="control-label col-sm-2">显示排序</label>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="50" class="form-control large" name="sort_order" value="{$goods_category_info.sort_order}"/>
                                        <span class="help-inline" style="color:#F00; display:none;" id="err_sort_order"></span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-sm-2">分佣比例</label>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="50" class="form-control large" name="commission_rate" id="commission_rate" value="{$goods_category_info.commission_rate|default='0'}" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')"/>
                                    </div>
                                    <div class="col-sm-1" style="margin-top: 6px;margin-left: -20px;">
                                        <span>%</span> 
                                    </div>
                                </div>                                								                                                               
                        </div>
                        <div class="box-footer">                        	
                            <input type="hidden" name="id" value="{$goods_category_info.id}">                           
                        	<button type="reset" class="btn btn-primary pull-left"><i class="icon-ok"></i>重填  </button>                       	                 
                            <button type="button" onclick="ajax_submit_form('category_form','{:U('Category/addEditCategory?is_ajax=1')}');" class="btn btn-primary pull-right"><i class="icon-ok"></i>提交  </button>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </section>
</div>
<script>  
    
/** 以下是编辑时默认选中某个商品分类*/
$(document).ready(function(){
	<if condition="$level_cat['2'] gt 0">	
		 // 如果当前是二级分类就让一级父id默认选中
		 $("#parent_id_1").val('{$level_cat[1]}'); 
		 get_category('{$level_cat[1]}','parent_id_2','0');		 
	</if>	 
	<if condition="$level_cat['3'] gt 0">
		 // 如果当前是三级分类就一级和二级父id默认 都选中
		 $("#parent_id_1").val('{$level_cat[1]}');		 	
		 get_category('{$level_cat[1]}','parent_id_2','{$level_cat[2]}');	
	</if>	
});
 
</script>
   
</body>
</html>