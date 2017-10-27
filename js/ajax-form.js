$(document).ready(function(){

	$('#file-form').submit(function(e){
	 	e.preventDefault();
	 	var validateError=true;
	 	var name=$('#name').val();
	 	var email=$('#email').val();
	 	var phone=$('#phone_no').val();
	 	var file=$('#t-file').get(0).files.length;
	 	var value=$('#submit').val();
	 	
        
      

	    var atpos = email.indexOf("@");
	    var dotpos = email.lastIndexOf(".");
	    


	 	if(value=="Send") {

	 		if(name==""){
	 		   $('#name-error').html("Please enter your name");
               $('#name-error').css({
                    'top' : '-130%',
                    'z-index' : '200'
               });
	 		    $("input[type='text'][id$='name']").keypress( function () {
                    $('#name-error').css({
                        'top' : '0',
                        'z-index' : '-10'
                    });
                });
	 		   validateError=false;
		 	}

		 	if(email==""){
		 		$('#email-error').html("Please enter email address");
                $('#email-error').css({
                    'top' : '-130%',
                    'z-index' : '200'
                });
		 		$("input[type='text'][id$='email']").keypress( function () {
                    $('#email-error').css({
                        'top' : '0',
                        'z-index' : '-10'
                    });
                });
		 		validateError=false;
		 	} else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
		 		$('#email-error').html("Invalid email");
                $('#email-error').css({
                    'top' : '-130%',
                    'z-index' : '200'
                });
		 		$("input[type='text'][id$='email']").keypress( function () {
                    $('#email-error').css({
                        'top' : '0',
                        'z-index' : '-10'
                    });
                });
		 		validateError=false;
		 	}

		 	if(phone==""){
	 		   $('#phone-error').html("Please provide your phone no");
               $('#phone-error').css({
                    'bottom' : '-130%',
                    'z-index' : '200'
                });
	 		    $("input[type='text'][id$='phone_no']").keypress( function () {
                    $('#phone-error').css({
                        'bottom' : '0',
                        'z-index' : '-10'
                    });
                });
	 		   validateError=false;
		 	} else if (isNaN(phone)){
		 		$('#phone-error').html("This value should be numeric");
                $('#phone-error').css({
                    'bottom' : '-130%',
                    'z-index' : '200'
                });
	 		    $("input[type='text'][id$='phone_no']").keypress( function () {
                    $('#phone-error').css({
                        'bottom' : '0',
                        'z-index' : '-10'
                    });
                });
	 		   validateError=false;
		 	}

		 	if(file==0){
		 		$('#file-error').html("Please select your file");
                $('#file-error').css({
                    'bottom' : '-130%',
                    'z-index' : '200'
                });
	 		    $("#t-file").change( function () {
                    $('#file-error').css({
                        'bottom' : '0',
                        'z-index' : '-10'
                    });
                });
	 		   validateError=false;
		 	} else {
                 var file_size = $('#t-file')[0].files[0].size;
                 if(file_size>1000000) {
                   $("#file-error").html("File Size is too large. it must be less than 1MB.");
                   $('#file-error').css({
                        'bottom' : '-130%',
                        'z-index' : '200'
                    });
                    validateError=false;
                    $('#t-file').change(function () {
                        $('#file-error').css({
                            'bottom' : '0',
                            'z-index' : '-10'
                        });
                    });
                }
		 	}


		 	if(validateError == true) {
		 		var formData = new FormData($(this)[0]);
		 		$.ajax({
                    type : 'POST',
                    url  : 'admin/file-form.php',
                    data : formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function()
                    {
                      //$("#register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                    },
                    success :  function(data)
                    {
                      var result = $.trim(data);
                      if(result == "success") {
                        $('#file-form').trigger("reset");
                        popUp();
                      }
                      if(result == "The file already exists.") {
                        $('.pop-header').css({'background':'#e54b48'});
                        $('.popup').find("h1").html("Error !!!").css({
                            'font-size' : '1.4em',
                            'color' : '#e54b48',
                            'margin-top' : '35px'
                        });
                        $('.popup').find("p").html("The file already exists. please contact us for more details. 974-44353151").css({
                            'color' : '#e54b48',
                            'font-size' : '0.7em',
                            'line-height' : '27px',
                            'width' : '55%'
                        });
                        popUp();
                      }
                    }
                });
                return false;
		 	}

	 	}



	 });

	function popUp(){
        $('.popup').css({
          'transform':'translateY(0)',
          'z-index':'100000'
        });
    
        $('body').addClass('overlay');
    
    
        // $(this).css({
        //   'z-index':'-1'
        // });
    
        $('.popup > .close').on('click',function(){
            $(this).parent().css({
                'transform':'translateY(-300%)'
            });
     
            $('body').removeClass('overlay');
              $(this).parent().siblings('.btn').css({
                'z-index':'1'
            });
        });
    }
});


