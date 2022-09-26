jQuery(document).ready(function(){
    jQuery(document).on("click",".edit",function(){
        var id=jQuery(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = jQuery("#name").val();
        var des = jQuery("#des").val();
        var size = jQuery("#size").val();
        var color = jQuery("#color").val();
        var product_code = jQuery("#product_code").val();
        var sale_price = jQuery("#sale_price").val();
        var cost_price = jQuery("#cost_price").val();
        $.ajax({
            url:"/product/update/"+id,
            type:"POST",
            dataType:"JSON",
            data:{
                name :name,
                des :des,
                size :size,
                color :color,
                product_code :product_code,
                sale_price :sale_price,
                cost_price :cost_price
            },
            success:function(response){
                show(); 
                jQuery(".msg").show().text("Product Updated");
                jQuery(".msg").fadeOut(1000);
                jQuery("#edit").modal("hide");
            }
        });
    });
    jQuery(document).on("click",".btn-edit",function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/edit/"+id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
               jQuery("#name").val(response.data.name); 
               jQuery("#des").val(response.data.des); 
               jQuery("#size").val(response.data.size); 
               jQuery("#color").val(response.data.color); 
               jQuery("#product_code").val(response.data.product_code); 
               jQuery("#cost_price").val(response.data.cost_price); 
               jQuery("#sale_price").val(response.data.sale_price); 
               jQuery(".edit").val(response.data.id); 
            }
        })
    });
    jQuery(document).on("click",".btn-delete",function(){
        var id=jQuery(this).val();
        jQuery(".delete").val(id);
    });
    jQuery(document).on("click",".delete",function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/destroy/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                show(); 
                jQuery(".msg").show().text("Product Deleted");
                jQuery(".msg").fadeOut(1000);
                jQuery("#delete").modal("hide");
            }
        })
    })
    show(); 
    function show(){
        $.ajax({
            url:'/product/show',
            type:'get',
            dataType:'JSON',
            success:function(response){
                var data='';
                $.each(response.data, function(key, abm){
                    data+='<tr>\
                    <td>'+abm.product_code+'</td>\
                    <td>'+abm.name+'</td>\
                    <td>'+abm.cost_price+'</td>\
                    <td>'+abm.sale_price+'</td>\
                    <td>\
                        <button data-toggle="modal" data-target="#edit" value="'+abm.id+'" class="btn btn-info btn-edit btn-sm"><i class="fa fa-edit"></i></button>\
                        <button data-toggle="modal" data-target="#delete" value="'+abm.id+'" class="btn btn-danger btn-delete btn-sm"><i class="fa fa-trash"></i></button>\
                    </td>\
                </tr>';
                });
                jQuery(".data").html(data);
            }
        })
    }
    jQuery(".btn-add").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = jQuery(".name").val();
        var des = jQuery(".des").val();
        var size = jQuery(".size").val();
        var color = jQuery(".color").val();
        var product_code = jQuery(".product_code").val();
        var sale_price = jQuery(".sale_price").val();
        var cost_price = jQuery(".cost_price").val();
        $.ajax({
            url:"/product/store",
            type:"post",
            dataType:"json",
            data:{
                name :name,
                des :des,
                size :size,
                color :color,
                product_code :product_code,
                sale_price :sale_price,
                cost_price :cost_price
            },
            success:function(response)
            {
                if(response.status=="faild"){
                    jQuery(".error_name").text(response.errors.name);
                    jQuery(".error_des").text(response.errors.des);
                    jQuery(".error_size").text(response.errors.size);
                    jQuery(".error_color").text(response.errors.color);
                    jQuery(".error_product_code").text(response.errors.product_code);
                    jQuery(".error_cost_price").text(response.errors.cost_price);
                    jQuery(".error_sale_price").text(response.errors.sale_price);
                }
                else{
                    show();
                    jQuery(".msg").show().text("Product Added");
                    jQuery(".msg").fadeOut(1000);

                    jQuery(".error_name").text("");
                    jQuery(".error_des").text("");
                    jQuery(".error_size").text('');
                    jQuery(".error_color").text('');
                    jQuery(".error_product_code").text('');
                    jQuery(".error_cost_price").text('');
                    jQuery(".error_sale_price").text('');
                    jQuery(".name").val('');
                    jQuery(".des").val('');
                    jQuery(".size").val('');
                    jQuery(".color").val('');
                    jQuery(".product_code").val('');
                    jQuery(".sale_price").val('');
                    jQuery(".cost_price").val('');
                }
            }
        })
    })
    jQuery(document).on("keyup",".product_id",function(){
        var _product_id = jQuery(this).val();

        $.ajax({

            url: "/purchase/find/"+_product_id,
            type: "GET",
            dataType: "json",
            success:function(response){
                jQuery(".cost_price").val(response.product.cost_price);

                if(response.stock.length == 0){
                    jQuery(".astock").val("0");
                }
                else{
                    
                    $.each(response.stock,function(key, item){
                     jQuery(".astock").val(item.quantity);
                    });
                }

            }
        })
    })
    jQuery(document).up("keyup",".qnt",function(){
        var _qnt = jQuery(this).val();
        var _cost_price = jQuery(".cost_price").val();
        var _total = _qnt * _cost_price;
        jQuery(".total_amount").val(_total);

    })

    jQuery(document).on("keyup",".dis",function(){
        var _dis = jQuery(this).val();
        var _total = jQuery(".total_amount").val();
        var _dis_total = ((_total*_dis)/100);
        var _grand_total = _total - _dis_total;

        jQuery(".dis_amount").val(_dis_total);
        jQuery(".grand_total").val(_grand_total);

    })
    jQuery(".btn-purchaseAdd").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var date = jQuery(".date").val();
        var br_id = jQuery(".br_id").val();
        var company_name = jQuery(".company_name").val();
        var invoice = jQuery(".invoice").val();
        var product_id = jQuery(".product_id").val();
        var dis = jQuery(".dis").val();
        var dis_amount = jQuery(".dis_amount").val();
        var total_amount = jQuery(".total_amount").val();
        var qnt = jQuery(".qnt").val();

        $.ajax({

            url: "/purchase/store",
            type: "post",
            datatype: "json",
            data: {
                date  : date,
                br_id : br_id,
                company_name : company_name,
                invoice : invoice,
                product_id : product_id,
                dis : dis,
                dis_amount : dis_amount,
                total_amount : total_amount,
                qnt : qnt
            },
            success:function(response){
                alert("saved")
            }

        })


    });

})