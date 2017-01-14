<include file="Public/min-header" />
<div class="wrapper">
    <include file="Public/breadcrumb" />
    <style>
        #search-form>.form-group {
            margin-left: 10px;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 商品列表</h3>
                </div>
                <div class="panel-body">
                    <div class="navbar navbar-default">
                        <form action="" id="search-form2" class="navbar-form form-inline" method="post" onsubmit="return false">
                            <div class="form-group">
                                <select name="cat_id" id="cat_id" class="form-control">
                    <option value="">所有分类</option>
                    <foreach name="categoryList" item="v" key="k" >
                        <option value="{$v['id']}"> {$v['name']}</option>
			 		</foreach>
                  </select>
                            </div>
                            <div class="form-group">
                                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="">所有品牌</option>
                        <foreach name="brandList" item="v" key="k" >
                           <option value="{$v['id']}">{$v['name']}</option>
						</foreach>
                  </select>
                            </div>

                            <div class="form-group">
                                <select name="is_on_sale" id="is_on_sale" class="form-control">
                    <option value="">全部</option>                  
                    <option value="1">上架</option>
                    <option value="0">下架</option>
                  </select>
                            </div>
                            <div class="form-group">
                                <select name="intro" class="form-control">
                        <option value="0">全部</option>
                        <option value="is_new">新品</option>
                        <option value="is_recommend">推荐</option>
                    </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="input-order-id">关键词</label>
                                <div class="input-group">
                                    <input type="text" name="key_word" value="" placeholder="搜索词" id="input-order-id" class="form-control">
                                </div>
                            </div>
                            <!--排序规则-->
                            <input type="hidden" name="orderby1" value="goods_id" />
                            <input type="hidden" name="orderby2" value="desc" />
                            <button type="submit" onclick="ajax_get_table('search-form2',1)" id="button-filter search-order" class="btn btn-primary"><i class="fa fa-search"></i> 筛选</button>
                            <button type="button" onclick="location.href='{:U('Goods/addEditGoods')}'" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>添加新商品</button>
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
    $(document).ready(function() {
        // ajax 加载商品列表
        ajax_get_table('search-form2', 1);

    });


    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form, page) {
        cur_page = page; //当前页面 保存为全局变量
        $.ajax({
            type: "POST",
            url: "/index.php?g=Shop&m=goods&a=ajaxGoodsList&p=" + page, //+tab,
            data: $('#' + form).serialize(), // 你的formid
            success: function(data) {
                $("#ajax_return").html('');
                $("#ajax_return").append(data);
            }
        });
    }

    // 点击排序
    function sort(field) {
        $("input[name='orderby1']").val(field);
        var v = $("input[name='orderby2']").val() == 'desc' ? 'asc' : 'desc';
        $("input[name='orderby2']").val(v);
        ajax_get_table('search-form2', cur_page);
    }

    // 删除操作
    function del(id) {
        if (!confirm('确定要删除吗?'))
            return false;
        $.ajax({
            url: "/index.php?g=Shop&m=goods&a=delGoods&id=" + id,
            success: function(v) {
                var v = eval('(' + v + ')');
                if (v.hasOwnProperty('status') && (v.status == 1))
                    ajax_get_table('search-form2', cur_page);
                else
                    layer.msg(v.msg, {
                        icon: 2,
                        time: 1000
                    }); //alert(v.msg);
            }
        });
        return false;
    }
</script>
</body>

</html>