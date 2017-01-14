<include file="Public/min-header"/>
<div class="wrapper">
    <include file="Public/breadcrumb"/>
    <section class="content">
        <!-- Main content -->
        <div class="container-fluid">
            <div class="pull-right">
                <a href="javascript:history.go(-1)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="返回"><i class="fa fa-reply"></i></a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 商品属性</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_tongyong" data-toggle="tab">商品属性</a></li>
                    </ul>
                    <!--表单数据-->
                    <form method="post" id="addEditGoodsAttributeForm">                    
                        <!--通用信息-->
                    <div class="tab-content">                 	  
                        <div class="tab-pane active" id="tab_tongyong">
                           
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>属性名称：</td>
                                    <td>
                                        <input type="text" value="{$goodsAttribute.attr_name}" name="attr_name"/>
                                        <span id="err_attr_name" style="color:#F00; display:none;"></span>                                        
                                    </td>
                                </tr>  
                                <tr>
                                    <td>所属商品类型：</td>
                                    <td>
                                        <select name="type_id" id="type_id">
                                             <option value="">请选择</option>
                                            <volist name="goodsTypeList" id="vo">
                                             <option value="{$vo[id]}" <if condition="$vo[id] eq $goodsAttribute[type_id]">selected="selected"</if>>{$vo[name]}</option>
                                            </volist>                                        
                                        </select>
                                        <span id="err_type_id" style="color:#F00; display:none;"></span>                                        
                                    </td>
                                </tr>  
                                <tr>
                                    <td>能否进行检索：</td>
                                    <td>
                                        <input type="radio" value="0" name="attr_index" <if condition="$goodsAttribute[attr_index] eq 0">checked="checked"</if>  .>不需要检索
                                        <input type="radio" value="1" name="attr_index" <if condition="($goodsAttribute[attr_index] eq 1) or ($goodsAttribute[attr_index] eq NULL)">checked="checked"</if>  />关键字检索
                                        <!--<input type="radio" value="2" name="attr_index" <if condition="$goodsAttribute[attr_index] eq 2">checked="checked"</if>  />范围检索-->
                                    </td>
                                </tr>  
                                <!--
                                <tr>
                                    <td>属性是否可选：</td>
                                    <td>
                                        <input type="radio" value="0" name="attr_type" <if condition="($goodsAttribute[attr_type] eq 0) or ($goodsAttribute[attr_type] eq NULL)">checked="checked"</if>  />唯一属性
                                        <input type="radio" value="1" name="attr_type" <if condition="$goodsAttribute[attr_type] eq 1">checked="checked"</if> />单选属性
                                        <input type="radio" value="2" name="attr_type" <if condition="$goodsAttribute[attr_type] eq 2">checked="checked"</if> />复选属性 
                                    </td>
                                </tr>  
                                -->
                                <tr>
                                    <td>该属性值的录入方式：</td>
                                    <td>
                                        <input type="radio" value="0" name="attr_input_type" <if condition="($goodsAttribute[attr_input_type] eq 0) or ($goodsAttribute[attr_input_type] eq NULL)">checked="checked"</if> />手工录入
                                        <input type="radio" value="1" name="attr_input_type" <if condition="$goodsAttribute[attr_input_type] eq 1">checked="checked"</if>  />从下面的列表中选择（一行代表一个可选值）
                                        <input type="radio" value="2" name="attr_input_type" <if condition="$goodsAttribute[attr_input_type] eq 2">checked="checked"</if>  />多行文本框                                     
                                    </td>
                                </tr>  
                                <tr>
                                    <td>可选值列表：</td> 
                                    <td>
                                    <textarea rows="5" cols="30" name="attr_values">{$goodsAttribute.attr_values}</textarea>
                                    录入方式为手工或者多行文本时，此输入框不需填写。
                                    <span id="err_attr_values" style="color:#F00; display:none;"></span>
                                    </td>
                                </tr>                                
                                </tbody>                                
                                </table>
                        </div>                           
                    </div>              
                    <div class="pull-right">
                        <input type="hidden" name="attr_id" value="{$goodsAttribute.attr_id}">
                        <button class="btn btn-primary" title="" data-toggle="tooltip" type="button" onclick="ajax_submit_form('addEditGoodsAttributeForm','{:U('Attribute/addEditGoodsAttribute?is_ajax=1')}');" data-original-title="保存"><i class="fa fa-save"></i></button>
                    </div>
			    </form><!--表单数据-->
                </div>
            </div>
        </div>    <!-- /.content -->
    </section>
</div>
</body>
</html>