/* Overriding Javascript's Alert Dialog */

function alert(title, msg) {
	$('#alert')
    	.jqmShow()
    	.find('div.jqmAlertContent')
      	.html(msg);
	$('#alert')
		.find('.jqmAlertTitle h1')
		.html(title);
}

$().ready(function() {
  $('#alert').jqm({overlay: 20, modal: true, trigger: false});
  
  // trigger an alert whenever links of class alert are pressed.
  /*$('a.alert').click(function() { 
    alert('You Have triggered an alert!'); 
    return false;
  });*/
  
});


/* Overriding Javascript's Confirm Dialog */

// NOTE; A callback must be passed. It is executed on "cotinue". 
//  This differs from the standard confirm() function, which returns
//   only true or false!

// If the callback is a string, it will be considered a "URL", and
//  followed.

// If the callback is a function, it will be executed.


function confirm(msg,callback) {
  $('#confirm')
    .jqmShow()
    .find('p.jqmConfirmMsg')
      .html(msg)
    .end()
    .find(':submit:visible')
      .click(function(){
        if(this.value == 'yes')
          (typeof callback == 'string') ?
            window.location.href = callback :
            callback();
        $('#confirm').jqmHide();
      });
}


$().ready(function() {
  $('#confirm').jqm({overlay: 20, modal: true, trigger: false});
  
  // trigger a confirm whenever links of class alert are pressed.
  $('a.confirm').click(function() { 
    confirm('About to visit: '+this.href+' !',this.href); 
    return false;
  });
});
