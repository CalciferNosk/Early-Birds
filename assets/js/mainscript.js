$(document).ready(function(){
    setInterval(function () {
        loadUserStatus()

    }, 5000);
    $(document).on('click','.timein-user',function(){
        $.ajax({
			type: "POST",
			url: `${base_url}time-in`,
			data: {
                confirm: 1
            },
			dataType: "json",
			success: function (data) {
                if(data.result == 1){
                    loadUserStatus()
                }
                else{
                    alert('error!:please contant Developer.')
                }
              
            },
		});
        
    })
    $(document).on('click','.timeout-user',function(){
        var timein_id = $(this).data('timeinid');

        if(timein_id == null){
            alert(`time in first`);
        }
        $.ajax({
			type: "POST",
			url: `${base_url}time-out`,
			data: {
                confirm: 1,
                timein_id:timein_id
            },
			dataType: "json",
			success: function (data) {
                if(data.result == 1){
                    loadUserStatus()
                }
                else{
                    alert('error!:please contant Developer.')
                }
              
            },
		});
        
    })



    function loadUserStatus(){
        $.ajax({
			type: "POST",
			url: `${base_url}get-time-record`,
			data: {
                confirm: 1
            },
			dataType: "json",
			success: function (data) {
                var td = `<thead>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Status</th>
                        </thead>
                        <tbody>`;
                $.each(data.result,function(k,v){
                    td += `
                            
                          
                             <tr style="${v.color} !important;border-bottom:1px solid #9c96964d">
                                <td style="padding:5px">${v.fullname}</td>
                                <td style="padding:5px">${v.group}</td>
                                <td style="padding:5px">${v.status}</td>
                             </tr>
                            `;
                })
                td += `</tbody>`;
                $('.loader').hide();
                $('#get-time-record-display').html(td);
              
            },
		});
    }
    
    $('#load-btn').on('click',function(){
        window.location.reload(0)
    })
    $('.comment-parent').on('click',function(){
        var id = $(this).data('nfid');
        var text = $('#comment-parent-'+id).val();

        if(text == '') {
            return false;
        }
        var formData = new FormData();
        formData.append('comment_text',text);
        formData.append('newsfeed_id',id);
        formData.append('comment_to','post');
        $('#comment-parent-'+id).val('')
        $('#loadinh').show()
        $.ajax({
			type: "POST",
			url: `${base_url}comment-post`,
			processData: false,
			contentType: false,
			data: formData,
			dataType: "json",
			success: function (data) {
            $('.bg-light').removeAttr('style');
            $('.new-comment').text('')
            $('#comment-main-display-'+id).
            prepend(`<div class="d-flex mb-3 ">
                        <a href="">
                            <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                        </a>
                        <div>
                            <div class="bg-light rounded-3 px-3 py-1" style="background-color:#9191b987 !important">
                                <a href="" class="text-dark mb-0">
                                    <strong>Erickson Adriano</strong>
                                </a>
                                <a href="" class="text-muted d-block">
                                    <small>${text}</small>
                                </a>
                            </div>
                           
                            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                            <a href="" class="text-muted small me-2" data-id="3"><strong>Reply</strong></a>
                            <i class="new-comment" style="color:gray" >new</i>
                            <br><br>
                               <!-- <div class="d-flex mb-3">

                                <a href="">
                                    <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                </a>
                                <div class="form-outline w-100 d-flex">
                                    <textarea class="form-control" id="reply-${data.last_id}" rows="2"></textarea>
                                    <label class="form-label" id="reply-" for="reply-${data.last_id}">Reply to Your Comment</label>
                                    <i class="fas fa-paper-plane eb-send sub-comment" data-scid="${data.last_id}"></i>
                                </div>
                            </div> -->

                        </div>
                    </div>`);
                    $('#loadinh').hide()
              
            },
		});
    })
    $('.sub-comment').on('click',function(){
        var id = $(this).data('scid');
        var text = $('#reply-'+id).val();

        if(text == '') {
            return false;
        }
        var formData = new FormData();
        formData.append('comment_text',text);
        formData.append('comment_id',id);
        formData.append('comment_to','sub_comment');
        $('#reply-'+id).val('')
        $.ajax({
			type: "POST",
			url: `${base_url}comment-post`,
			processData: false,
			contentType: false,
			data: formData,
			dataType: "json",
			success: function (data) {
            $('.bg-light').removeAttr('style');
            $('.new-comment').text('')
            $('#sub-comment-main-display-'+id).append(`<div class="d-flex mb-3 ">
                                                    <a href="">
                                                        <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                                                    </a>
                                                    <div>
                                                        <div class="bg-light rounded-3 px-3 py-1" style="background-color:#9191b987 !important">
                                                            <a href="" class="text-dark mb-0">
                                                                <strong>${data.fullname}</strong>
                                                            </a>
                                                            <a href="" class="text-muted d-block">
                                                                <small>${text}</small>
                                                            </a>
                                                        </div>
                                                        <i class="new-comment" >new</i>
                                                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                                                        <br><br>
                                                                                            
                                                        </div>

                                                    </div>
                                                </div>`);
              
            },
		});
    })



    // Chat 
    $('#Chat').on('click',function(){

        var allowed = $(this).data('allowed');
        if(allowed == 0){
            alert('You Don`t have Access to This Feature');
            return false;
        }
    })
})
$(document).ready(function () {
    $('#CreatePost').on('click',function(){
        console.log('here create')
        var CreatePost = $(this).data('create')
        if(CreatePost == 0){
                alert('You dont have accoess to this feature');
                return false;
        }
        else{
            $("#create-post").modal('show');
        }
    })

	$("#create-post-submit").on("submit", function (e) {
		e.preventDefault();

        
        var formData = new FormData($(this).get(0));
		var text_post = $("#text-post").val();
		var file_post = $("#file-post").val();
		if (text_post == "") {
			Swal.fire({
				icon: "error",
				title: "Oops...",
				text: "Empty post! Please Check.",
				// footer: '<a href="">Why do I have this issue?</a>'
			});

			return false;
		}
		if (file_post == "") {
			Swal.fire({
				title: "Attachment photo is empty?",
				text: "Do you want to Continue?",
				showDenyButton: true,
				showCancelButton: false,
				confirmButtonText: "Continue",
				denyButtonText: `cancel`,
			}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					createPost(formData);
                    $("#create-post").modal('hide');
				} else if (result.isDenied) {
					return false;
				}
			});
		}
        else{
            createPost(formData);
            $("#create-post").modal('hide');
        }
	});

	
});

function createPost(formData) {
    $.ajax({
        type: "POST",
        url: `${base_url}add-post`,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data.upload_msg);
            if(data.upload_msg == 0){
                location.reload();
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! not save!',
                  })
            }
        },
    });
}