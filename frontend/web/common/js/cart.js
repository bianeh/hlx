var _cart_sum = 0; //总合计
var _cart_sum_present = 0; //当前合计
var _cart_quantity = 0; //总数量
var _cart_quantity_present = 0; //当前数量
var _cart_data = new Array(); //保存选中单品ID;
var urlList = {
    "getCartData": "http://118.31.45.231/api.php/Home/Shopcart/index" ,//获取购物车列表
    "delectCart":"http://118.31.45.231/api.php/Home/Shopcart/deletecart" ,//删除购物车单品
    "upCartOrder":"http://118.31.45.231/api.php/Home/Shopcart/editshopcartnum",//修改数量
    "submitCart":"http://118.31.45.231/api.php/Home/Order/do_more_order" //结算
}

$(function() {
    if(!jQuery) {
        console.log("请加载jquery.js文件");
        return;
    }


    //cart.addCartList();
    // cart.getCartData(urlList.getCartData);

    //全选、反选
    $(document).on('click', '#allCheckbox', function() {
        if($(this).get(0).checked) {
            console.log("全选");
            //全选
            $(".checkbox").each(function() {
                $(this).prop("checked", true);
                //_cart_sum_present = _cart_sum;
                //_cart_quantity_present = _cart_quantity;
            })
        } else {
            console.log("反选");
            //反选
            $(".checkbox").each(function() {
                $(this).removeAttr("checked");
                //_cart_sum_present = 0;
                //_cart_quantity_present = 0;
            })
        }

        //合计
        $("#cartSum").html(_cart_sum_present);
        //结算数量
        $("#submitSum").html(_cart_quantity_present);

        // cart.countSum();//计算
    });

    //勾选
    $(document).on('click', '.checkbox', function() {
        allChk();
    });

    //结算 " .submit_accountId"
    /*	$('.submit_accountId').on('click', function() {
            //window.location.href = "notarize_order.html";
            if(_cart_quantity_present > 0){
                setLocation.openWindow("notarize_order.html");
            }else{
                mui.alert('请勾选要购买的单品', '', function() {
                        console.log("请勾选要购买的单品");
                    });
            }

        });*/

    mui(document).on("tap",".submit_accountId",function(){
        if(_cart_quantity_present > 0){
            //setLocation.openWindow("notarize_order.html");
            // cart.submitCart(urlList.submitCart);
        }else{
            mui.alert('请勾选要购买的单品', '', function() {
                console.log("请勾选要购买的单品");
            });
        }
    })

})

// var cart = {
//     getCartData: function(url) {
//         var user = JSON.parse(localStorage.getItem("user"));
//         $.ajax({
//             type: "POST",
//             url: url,
//             dataType: 'json',
//             data: {
//                 "loginName": user.id
//             },
//             success: function(data) {
//                 console.log(data);
//                 var news=data.webstatus;
//                 if(news == 0){
//                     console.log("没有新消息");
//                 }else if(news == 1){
//                     $(".nav_button_news_msg").addClass(".active");
//                 }
//
//                 if(data.shopinfo.length > 0) {
//                     cart.addCartList(data.shopinfo);
//                 } else {
//                     mui.toast("您还没添加商品");
//                 }
//
//             }
//         });
//     },
//     addCartList: function(data) {
//         var html = "",
//             id = "1", //产品id编号
//             brandName = "ZARA", //品牌名称
//             //brandLogo = "", //品牌LOGO
//             goodname = "ZARA 2017秋冬新品全场免运费 浏览时下流行趋势，购购买1000件", //产品名称
//             goods_price = 180, //价格
//             description = "<span>XXL</span><span>绿色（3个仓库发货）</span>", //商品描述
//             marketPrice = 500, //市场价
//             quantity = 10, //数量
//             goods_other_img1 = "../images/cart/image1.png"; //附图一
//         goodsid = 1;
//         _cart_quantity = data.length;
//
//         for(var i = 0; i < _cart_quantity; i++) {
//             id = data[i].cart_id;
//             brandName = data[i].brandname;
//             goodname = data[i].goodname;
//             goods_price = data[i].goods_price;
//             description = "<span class = 'spec1'>"+data[i].spec1+"</span>/&nbsp;&nbsp;<span class = 'spec2'>"+data[i].spec2+"</span>";
//             marketPrice = data[i].marketprice;
//             quantity = data[i].num;
//             goods_other_img1 = imgUrl+data[i].goods_other_img1;
//             _cart_sum += quantity * goods_price;
//             goodsid = data[i].id;
//
//             var goodsorderinfo = {};
//             goodsorderinfo.orderno = data[i].orderno;
//             goodsorderinfo.goodsid = data[i].id;
//             goodsorderinfo.brandid = data[i].brandid;
//             goodsorderinfo.spec1 = data[i].spec1;
//             goodsorderinfo.spec2 = data[i].spec2;
//             goodsorderinfo.goodsprice = data[i].goods_price;
//             goodsorderinfo.goodsnum = data[i].num;
//
//             _cart_data.push(goodsorderinfo);
//
//             html += "<div class=\"list\"><div class=\"list-head\"><div class=\"mui-input-row mui-checkbox mui-left\"><label>" + brandName + "</label><i class=\"list-head-icon\"></i></div></div>";
//             html += "<ul class=\"mui-table-view up-table-wiew\"><li class=\"my-table-view-cell mui-media\" ><a href=\"javascript:;\"><div class=\"row\"><div class=\"mui-input-row mui-checkbox mui-left up-checkbox\" goods_price = " + goods_price + " quantity = " + quantity + " orderId=" + id + " brandid = "+data[i].brandid+" orderno="+data[i].orderno+" goodsid="+goodsid+"><input class=\"checkbox\" name=\"checkbox1\" type=\"checkbox\" checked ></div> ";
//             html += "<div class=\"content\"><img class=\"mui-media-object mui-pull-left\" src=" + goods_other_img1 + "><div class=\"mui-media-body\"><h1 class=\"title mui-ellipsis-2\">" + goodname + "</h1><p class=\"mui-ellipsis style\">" + description + "</p><div class=\"price-group priceId\"><h1 class=\"price\"><i class=\"price-icon\">￥</i>" + goods_price + "<span class=\"decoration\">原价：" + marketPrice + "</span><p class=\"amount\">x<span class='amountId'>" + quantity + "</span></p></h1></div>";
//             html +="<div class=\"price-group add-sum-group display_flex price-action\"><h1 class=\"price flex_0\"><i class=\"price-icon\">￥</i>" + goods_price + "</h1><div class=\"mui-numbox flex_1\" data-numbox-step='5' data-numbox-min='0' data-numbox-max='100'><button class=\"mui-btn mui-numbox-btn-minus\" type=\"button\">-</button><input class=\"mui-numbox-input\" type=\"number\" quantity=" + quantity + "><button class=\"mui-btn mui-numbox-btn-plus\" type=\"button\">+</button></div></div></div></div></div></a></li></ul></div>";
//         }
//         $("#cartList").html(html);
//         _cart_sum_present = _cart_sum;
//         //合计
//         $("#cartSum").html(_cart_sum_present);
//         _cart_quantity_present = _cart_quantity;
//         //结算数量
//         $("#submitSum").html(_cart_quantity_present);
//     },
//     /*
//      *删除购物车
//      * */
//     delectCart:function(url,id){
//         var user = JSON.parse(localStorage.getItem("user"));
//
//         $.ajax({
//             type: "POST",
//             url: url,
//             dataType: 'json',
//             data: {
//                 loginName: user.id,
//                 id	:id
//             },
//             success: function(data) {
//                 console.log(data);
//                 if(data.code == "000008") {
//                     alert("删除成功");
//                     cart.getCartData(urlList.getCartData);
//                 } else {
//                     alert(data.msg);
//                 }
//
//             }
//         });
//     },
//     /*
//      *修改订单数量
//      * */
//     updataOrderSum : function(url,id,num){
//         var user = JSON.parse(localStorage.getItem("user"));
//
//         $.ajax({
//             type: "POST",
//             url: url,
//             dataType: 'json',
//             data: {
//                 loginName: user.id,
//                 id	:id,
//                 num:num
//             },
//             success: function(data) {
//                 console.log(data);
//                 if(data.code == "000008") {
//                     //alert("修改成功");
//                 } else {
//                     alert(data.msg);
//                 }
//
//             }
//         });
//     },
//     /*
//      *计算合计
//      * */
//     countSum:function(){
//         var price = 0, //价格
//             sum = 0, //合计
//             t=0, //数量
//             id = "",//
//             brandid = "",
//             spec1 = "",
//             spec2 = "",
//             orderno = "";
//         _cart_quantity_present = 0;
//
//         _cart_data = [];
//         $("#cartList .list").each(function(index){
//             //console.log($(".list")[index].find(".up-checkbox").attr("orderno"));
//
//             price = $(this).find(".up-checkbox").attr("goods_price");
//             t =  $(this).find(".mui-numbox-input").attr("quantity");
//             id = $(this).find(".up-checkbox").attr("goodsid");
//             brandid = $(this).find(".up-checkbox").attr("brandid");
//             spec1 = $(this).find(".spec1").html();
//             spec2 = $(this).find(".spec2").html();
//             orderno = $(this).find(".up-checkbox").attr("orderno");
//             $(this).find(".amountId").html(t);
//
//             if($(this).find(".checkbox").prop("checked") == true) {
//                 sum += price * t;
//                 _cart_quantity_present ++ ;
//                 //console.log(orderno);
//                 var goodsorderinfo = {};
//                 goodsorderinfo.orderno = orderno;
//                 goodsorderinfo.goodsid = id;
//                 goodsorderinfo.brandid = brandid;
//                 goodsorderinfo.spec1 = spec1;
//                 goodsorderinfo.spec2 = spec2;
//                 goodsorderinfo.goodsprice = price;
//                 goodsorderinfo.goodsnum = t;
//                 _cart_data.push(goodsorderinfo);
//             }
//
//
//         })
//
//         //console.log(_cart_data);
//         //console.log("--------------");
//         _cart_sum_present = sum;
//         //合计
//         $("#cartSum").html(_cart_sum_present);
//
//         //结算数量
//         $("#submitSum").html(_cart_quantity_present);
//     },
//     /*
//      * 结算
//      */
//     submitCart : function(url){
//         var user = JSON.parse(localStorage.getItem("user"));
//         console.log(_cart_data);
//         //return;
//         $.ajax({
//             type: "POST",
//             url: url,
//             dataType: 'json',
//             data:{
//                 "loginName":user.id,
//                 "goodsorderinfo":_cart_data
//             },
//             success: function(data) {
//                 console.log(data);
//                 if(data.code == "000008") {
//                     localStorage.setItem("sameorderNo", data.sameorderNo);
//                     setLocation.openWindow("notarize_order.html");
//                     //window.location.href = "notarize_order.html?sameorderNo="+data.sameorderNo;
//                     localStorage.setItem("orderno","");
//                 } else {
//                     alert(data.msg);
//                 }
//
//             }
//         });
//     }
// }

function allChk() {
    var chknum = $("#cartList :checkbox").size();
    var goods_price = 0,
        quantity = 0,
        id = 0;
    _cart_quantity_present = 0;
    _cart_sum_present = 0;
    //_cart_data_present = [];
    $("#cartList :checkbox").each(function() {
        if($(this).prop("checked") == true) {
            /*goods_price = $(this).parent().attr("goods_price");
            quantity = $(this).parent().attr("quantity");
            id = $(this).parent().attr("orderid");
            _cart_sum_present += (+goods_price) * (+quantity);
            console.log(_cart_sum_present);
            _cart_data_present.push(id);*/
            _cart_quantity_present++;
        }
    });
    if(chknum == _cart_quantity_present) {
        $("#allCheckbox").prop("checked", true);
    } else {
        $("#allCheckbox").prop("checked", false);
    }

    /*//合计
    $("#cartSum").html(_cart_sum_present);
    //结算数量
    $("#submitSum").html(_cart_quantity_present);
    console.log(_cart_data_present);*/
    // cart.countSum();//计算

}

