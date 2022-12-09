/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ajout_panier(id,url){
    console.log("eto    "+id);
    $.ajax({
        url:url,
        type:"post",
        data:{
            idProduit:id
        },
        // success:function(result){
        //     window.location.reload();
        // }
    });
}
