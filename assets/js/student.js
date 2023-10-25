


$(document).ready(function(){
    $('#news-feed-create-btn').show();
    $('.nav-show').on('click',function(){
        var show_id = $(this).data('show');
        if(show_id == 'main-home'){
            $('#news-feed-create-btn').show();
        }
        else{
            $('#news-feed-create-btn').css('display','none');
        }
        $('.content-view').hide();
        $('#'+show_id).show();


    })
})


$(document).on('click','#logout',function(){
    // alert. here
    location.href = base_url+'logout';
})

$(window).on('load',function(){
    // loadNewsFeed();
})








/// removed this 
function loadNewsFeed(){
   
    $.ajax({
        type: "POST",
        url: `${base_url}student-data`,
        data: {
            role: 2,
        },
        dataType: "json",
        success: function (data_list) {
            var data = data_list.result;
            var newsfeed = data_list.newsfeed;
            var fullname = data.lname + ', ' + data.fname;
            $('#stud_username').text(data.lname);
            var newsfeed_display = '';
            $.each(newsfeed,function(k,v){
                var  user_liked = v.user_liked == 0 ? 'like-post':'eb-font-liked';
                newsfeed_display += ` <section class="m-3">
                                        <div class="card shadow-lg" style="max-width: 42rem">
                                            <div class="card-body">
                                                <!-- Data -->
                                                <div class="d-flex mb-3">
                                                    <a href="">
                                                        <img onerror="this.src='${base_url}assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/ /new/avatars/18.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                                    </a>
                                                    <div>
                                                        <a href="" class="text-dark mb-0">
                                                            <strong>${v.CreatedBy}</strong>
                                                        </a>
                                                        <a href="" class="text-muted d-block" style="margin-top: -6px">
                                                            <small>10h</small>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Description -->
                                                <div>
                                                    <p>
                                                    ${v.newsfeed}
                                                    </p>
                                                </div>
                                            </div>`

                                        // check i have image attachment
                     newsfeed_display +=  v.img == null ? '' : `<div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light" style="padding:50px;">
                                                                    <img onerror="this.src='${base_url}assets/img/default.jpg'" src="${base_url}assets/img/NewsFeedSrc/${v.img}" class="w-100" />
                                                                    <a href="#!">
                                                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                                    </a>
                                                                </div>`
                                      
                      newsfeed_display += `<div class="card-body">
                                            <!-- Reactions -->
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>`
                                            //check ifhave like 
                      newsfeed_display +=    v.like_total == 0 ? '<span></span>' :`<span><a href="">
                                                        <i class="fas fa-thumbs-up text-primary"></i>
                                                       
                                                        <span>${ v.like_total}</span>
                                                    </a></span>`

                                        // check if user like this post
                      newsfeed_display += `</div>
                                                <div>
                                                    <a href="#" class="text-muted view-comment"> 8 comments </a>
                                                </div>
                                            </div>
                                    
                                            <div class="d-flex justify-content-between text-center border-top border-bottom mb-4">
                                                <button type="button" data-id=""${v.id} class="btn btn-link btn-lg ${user_liked}" data-mdb-ripple-color="dark">
                                                    <i class="fas fa-thumbs-up me-2"></i>Like
                                                </button>
                                                <button type="button" data-id="${v.id}"  class="btn btn-link btn-lg view-comment" data-mdb-ripple-color="dark">
                                                    <i class="fas fa-comment-alt me-2"></i>Comment
                                                </button>
                                                <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                                                    <i class="fas fa-share me-2"></i>Share
                                                </button>
                                            </div>
                                                <div class="d-flex mb-3 ">
                                                    <a href="">
                                                        <img  onerror="this.src='${base_url}assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                                    </a>
                                                    <div class="form-outline w-100 d-flex">
                                                        <textarea class="form-control" id="comment-parent-${v.id}" rows="2"></textarea>
                                                        <label class="form-label" for="comment-${v.id}">Write a comment</label>
                                                        <i class="fas fa-paper-plane eb-send comment-parent" data-nfid="${v.id}"></i>
                                                    </div>
                                                </div>
                                        `
                                 // check if have comment
                if(v.comments != null){
                    $.each(v.comments,function(c_k,c_v){
                        newsfeed_display += ` 

                                                <!-- Single answer -->
                                                <div class="parent-full-display-${v.id}">
                                                <div class="d-flex mb-3 ">
                                                    <a href="">
                                                        <img  onerror="this.src='${base_url}assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                                    </a>
                                                    <div>
                                                        <div class="bg-light rounded-3 px-3 py-1">
                                                            <a href="" class="text-dark mb-0">
                                                                <strong>${c_v.CreatedBy}</strong>
                                                            </a>
                                                            <a href="" class="text-muted d-block">
                                                                <small>
                                                                    ${c_v.comment}</small>
                                                            </a>
                                                        </div>
                                                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                                                        <a href="" class="text-muted small me-2" data-id="${c_v.id}"><strong>Reply</strong></a>
                                                        <br><br>
                                                        `;
                                                      
                                        //check if have sub comment
                                         if(c_v.sub_comment != null)
                                         {
                                            console.log('here'+ c_k)
                                            $.each(c_v.sub_comment,function(sc_k,sc_v)
                                            {

                        newsfeed_display += `<div class="d-flex mb-3">
                                                <a href="">
                                                    <img onerror="this.src='${base_url}assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                                </a>
                                                <div>
                                                    <div class="bg-light rounded-3 px-3 py-1">
                                                        <a href="" class="text-dark mb-0">
                                                            <strong>${sc_v.CreatedBy}</strong>
                                                        </a>
                                                        <a href="" class="text-muted d-block">
                                                            <small>${sc_v.comment}</small>
                                                        </a>
                                                    </div>
                                                    <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                                                <!-- <a href="" class="text-muted small me-2"><strong>Report</strong></a>-->
                                                </div>
                                            </div>
                                            `;
                                            })
                                        }

                        newsfeed_display +=      ` <div class="d-flex mb-3">
                                                        <a href="">
                                                            <img  onerror="this.src='${base_url}assets/img/default.jpg'" src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                                        </a>
                                                        <div class="form-outline w-100 d-flex">
                                                            <textarea class="form-control" id="reply-${c_v.id}" rows="2"></textarea>
                                                            <label class="form-label" id="reply-" for="reply-${c_v.ID}">Reply to ${c_v.fname}</label>
                                                            <i class="fas fa-paper-plane eb-send"></i>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>`;
                    })
                }
                
                newsfeed_display +=  `</div>
                                    </div>
                                    </div>
                                </section> <br>`
                                
            })
            

            $('#newsfeed-display').html(newsfeed_display);

            $(document).on('click','.like-post', function() {
                console.log()
                $(this).addClass('eb-font-liked',true);
                $(this).removeClass('like-post');
                
            })

            $(document).on('click','.comment-parent',function(){
                    var id = $(this).data('nfid');
                    var text = $('#comment-parent-'+id).val();

                    if(text == ''){
                        return false;
                    }

                    $('.parent-full-display-'+id).prepend(`<div class="d-flex mb-3 ">
                    <a href="">
                        <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                    </a>
                    <div>
                        <div class="bg-light rounded-3 px-3 py-1">
                            <a href="" class="text-dark mb-0">
                                <strong>Pedro Penduco</strong>
                            </a>
                            <a href="" class="text-muted d-block">
                                <small>
                                    ${text}</small>
                            </a>
                        </div>
                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                        <a href="" class="text-muted small me-2" data-id="3"><strong>Reply</strong></a>
                        <br><br>
                         <div class="d-flex mb-3">
                        <a href="">
                            <img onerror="this.src='http://localhost/Early-Birds/assets/img/default.jpg'" src="http://localhost/Early-Birds/assets/img/default.jpg" class="border rounded-circle me-2" alt="Avatar" style="height: 40px">
                        </a>
                        <div class="form-outline w-100 d-flex">
                            <textarea class="form-control" id="reply-3" rows="2"></textarea>
                            <label class="form-label" id="reply-" for="reply-undefined">Reply to Pedro</label>
                            <i class="fas fa-paper-plane eb-send"></i>
                        </div>
                    </div>
                    </div>
                </div>`)

            })
            
        },
    });
}
