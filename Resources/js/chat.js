
function updateChat() {
	$.ajax({url: 'app.php', type: 'GET', dataType: 'json',
	success: function(data) {
		var textArea = document.getElementById('chat');
		var input_usr = document.getElementById('usr');
		var input_msg = document.getElementById('msg');
		input_usr.value = '';
		input_msg.value = '';
		textArea.value = '';
		for (var i = 0; i < data.length; i++) {
			textArea.value += data[i].time + ' ' + data[i].usr + '> ' + data[i].msg + '\n';
			textArea.scrollTop = textArea.scrollHeight;
		}
	}
	});

}

function sendForm(event) {
    event.preventDefault();
	var arr = {'usr': document.getElementById('usr').value, 'msg': document.getElementById('msg').value};    
	var str = JSON.stringify(arr);     		
        $.ajax({
          type: 'POST',
          url: 'app.php',
          data: "str=" + str,
          success: function(data){
			  updateChat();
          },
		  error: function(xhr) {
			alert(xhr.responseText);
		}
        });
}
	
