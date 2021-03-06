<form method="post" enctype="multipart/form-data" target="_blank" id="form-goodsType">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>                
                <th class="sorting text-left">ID</th>
                <th class="sorting text-left">属性名称</th>
                <th class="sorting text-left">商品类型</th>
                <th class="sorting text-left">属性值的输入方式</th>
                <th class="sorting text-left">可选值列表</th>
                <th class="sorting text-center">筛选</th>
                <th class="sorting text-left">排序</th>
                <th class="sorting text-right">操作</th> 
            </tr>
            </thead>
            <tbody>
            <volist name="goodsAttributeList" id="list">
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="selected[]" value="6">
                    </td>
                    <td class="text-right">{$list.attr_id}</td>
                    <td class="text-left">{$list.attr_name}</td>
                    <td class="text-left">{$goodsTypeList[$list[type_id]]}</td>
                    <td class="text-left">{$attr_input_type[$list[attr_input_type]]}</td>
                    <td class="text-left">{$list.attr_values|mb_substr=0,30,'utf-8'}</td>
                    <td class="text-center">                        
                        <img width="20" height="20" src="{$config_siteurl}statics/extres/shop/images/<if condition='$list[attr_index] eq 1'>yes.png<else />cancel.png</if>" onclick="changeTableVal('goods_attribute','attr_id','{$list.attr_id}','attr_index',this)"/>
                    </td>                    
                    <td class="text-left">
                        <input type="text" onchange="updateSort('goods_attribute','attr_id','{$list.attr_id}','order',this)" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')"  size="4" value="{$list.order}"/>
                    </td>
                    <td class="text-right">                       
                        <a href="{:U('Attribute/addEditGoodsAttribute',array('attr_id'=>$list['attr_id']))}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
                        <a onclick="del_fun('{:U('Attribute/delGoodsAttribute',array('id'=>$list['attr_id']))}');" id="button-delete6" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="删除"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            </volist>
            </tbody>
        </table>
    </div>
</form>
<div class="row">
    <div class="col-sm-6 text-left"></div>
    <div class="col-sm-6 text-right">{$page}</div>
</div>
<script>
    // 点击分页触发的事件
    $(".pagination  a").click(function(){
        cur_page = $(this).data('p');
        ajax_get_table('search-form2',cur_page);
    });
 
</script>