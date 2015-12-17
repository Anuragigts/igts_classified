<script>
    $( ".getall" ).change(function() {
            var cv = $(this).val();
            var cust = $(this).attr("cust");
            $.post( "<?php echo base_url();?>common/getAll",{cv:cv,cust :cust},function( data ) {
                        $(".tb-row").html(data);
            });
    });
    $( ".country" ).change(function() {
            var cv = $(this).val();
            $.post( "<?php echo base_url();?>common/getStates",{cv:cv},function( data ) {
                        $(".state").html(data);
                        $(".city").html("<option value=''>-- Select City --</option>");
            });
    });
    $( ".state" ).change(function() {
            var st = $(this).val();
            $.post( "<?php echo base_url();?>common/getCities",{st:st},function( data ) {
                        $(".city").html(data);
            });
    });
    $(function(){
            /*  Not to allow special characters for email */
            $('input[type="email"]').keyup(function()
            {
                    var yourInput = $(this).val();
                    re = /[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi;
                    var isSplChar = re.test(yourInput);
                    if(isSplChar)
                    {
                            var no_spl_char = yourInput.replace(/[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '');
                            $(this).val(no_spl_char);
                    }
            });
            $('.sct-ret').keyup(function()
            {
                    var yourInput = $(this).val();
                    re = /[`~!#$%^*()|+\-=?;0123456789:'"@.<>\{\}\[\]\\\/]/gi;
                    var isSplChar = re.test(yourInput);
                    if(isSplChar)
                    {
                            var no_spl_char = yourInput.replace(/[`~!#$%^*()|+\-=?;0123456789:'"@.<>\{\}\[\]\\\/]/gi, '');
                            $(this).val(no_spl_char);
                    }
            });
            $('input[type=password]').bind('cut copy paste', function (e) {
               e.preventDefault();
            });
    });
    $(".cemail").blur(function(){
		var email = $(".cemail").val();
		$.post( "<?php echo base_url();?>common/checkEmail" , { email: email } ,function( data ) {
                        if(data > 0){
                                        $(".namrem").html("Email Id already Exists");
                        }
                        else{
                                        $(".namrem").html("");
                        }
		});
    });
    function validateR(element,replacement){
            //  IE
            if(! element)
             element = window.event.srcElement;
             element.value = element.value.replace(new RegExp(element.getAttribute('ruleset'), 'gi'), replacement);
    }
    function onlyAlpha(evt) {
            evt = (evt) ? evt : event;
                var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
                  ((evt.which) ? evt.which : 0));
                if (charCode == 32)
                        return true;
                if (charCode > 31 && (charCode < 65 || charCode > 90) &&
                  (charCode < 97 || charCode > 122)) {
                        return false;
                }
                else
                        return true;
    }
    $(".activate").click(function(){
            var login   =   $(this).attr("login");
            var name   =   $(this).attr("lname");
            $.post( "<?php echo base_url();?>common/custActDea" , { login: login , status : 1} ,function( data ) {
                    if(data > 0){
                            alert(name + " is activated");
                            location.reload();
                    }else{
                             alert(name + " is Not activated");
                    }
            });
    });
    $(".deactivate").click(function(){
            var login   =   $(this).attr("login");
            var name   =   $(this).attr("lname");
            $.post( "<?php echo base_url();?>common/custActDea" , { login: login , status : 0} ,function( data ) {
                    if(data > 0){
                            alert(name + " is Deactivated");
                            location.reload();
                    }else{
                             alert(name + " is Not Deactivated");
                    }
            });
    });
    $(".cat_chage").change(function(){
            var cat     =   $(this).val();
            $.post( "<?php echo base_url();?>common/getSubcat" , { cat: cat } ,function( data ) {
                    $(".scat_chage").html(data);
                    $(".sscat_chage").html('<option value=""> -- Select Sub Sub Category -- </option>');
            });
    });
    $(".scat_chage").change(function(){
            var cat     =   $(this).val();
            $.post( "<?php echo base_url();?>common/getssbcat" , { cat: cat } ,function( data ) {
                    $(".sscat_chage").html(data);
            });
    });
    
    
    // Main Page//
    $(".chk-pas").change(function(){
            var chk  =  $(this).prop("checked");
            if(chk == true){
                    $("#user-pass").attr('readonly',true);
            }
    });    
    $(".pay_check").change(function(){
            var valp = [];
            var vall = [];
            var ip = 0;
            // $(':checkbox:checked').each(function(i){
            //         valp[i] = $(this).val();
            //         vall[i] = parseFloat($(this).attr("price"));
            //         ip = ip + vall[i];
            // });
        $('input[name="pay_check[]"]:checked').each(function(i){
                    valp[i] = $(this).val();
                    vall[i] = parseFloat($(this).attr("price"));
                    ip = ip + vall[i];
            });
            // alert(ip); return false;
            $(".pay").html(ip.toFixed(2));
    });
    $(".btn-nop").click(function(){
            $.post("<?php echo base_url();?>login/checkunset" , function(){
                    location.reload();
            });
    });
    $(".btn-yes").click(function(){
            $.post("<?php echo base_url();?>postad/other_ad" , function(){
                    location.reload();
            });
    });
    $(".checkaddr").click(function(){
            var v = $(this).prop("checked");
            $("input:checkbox[name='"+$(this).attr("name")+"']").not(this).prop("checked",false);
            if(v == true){
                    var addr = $(this).val();
                    $.post("<?php echo base_url();?>common/checkaddr" ,{ addr : addr},function(dt){
                            var vp = dt.split("@@");
                            $(".zip").val(vp['3']);
                            $(".country").val(vp['2']);
                            $(".state").val(vp['1']);
                            $(".city").val(vp['0']);
                    });
            }else{
                    $(".zip").val("");
                    $(".country").val("");
                    $(".state").val("");
                    $(".city").val("");
            }
    });
    $(".sub_filter").click(function(){  
            var sea = $("#search-category").val();
            var key = $("#keyword").val();
            var loc = $("#id-location").val();
            $.post("<?php echo base_url();?>common/getsearch",{sea:sea , key:key ,loc : loc},function(dt){
                    //alert(dt);
                    $("#searchresults").html(dt);
            });            
    });
</script>