<!-- <script src="./public/js/script.js"></script> -->
<script src="./public/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
    $(document).ready(function(){
        $('#multi-question').select2();
        $('#multi-assignment').select2();
        $('.add-lesson').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('insert',1);
            $.ajax({
                url: "admin_list_lesson.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.reload();
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.change-lesson').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('id',$(this).attr('data-id'));
            formData.append('update',1);
            $.ajax({
                url: "admin_update_lesson.php",
                method: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.href="admin_list_lesson.php"
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.delete-lesson').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: "Thông báo xóa kỹ năng học",
                text: 'Bạn có muốn xóa kỹ năng này không?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonText: 'Đồng ý',
            }).then((res) => {
                if(res.isConfirmed){
                    let formData = new FormData();
                    formData.append('id',$(this).attr('data-id'));
                    formData.append('delete',1);
                    $.ajax({
                        url: "admin_list_lesson.php",
                        method: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            Swal.fire({
                                title: data.title,
                                text: data.text,
                                icon: data.icon
                            }).then((res) => {
                                if(res.isConfirmed){
                                    location.href="admin_list_lesson.php"
                                }
                            });
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
        //level
        $('.close-level').on('click',function(){
            $('#addLevel').modal('hide');
        })
        $('.add-level').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('insert',1);
            $.ajax({
                url: "admin_list_level.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.reload();
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.change-level').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('id',$(this).attr('data-id'));
            formData.append('update',1);
            $.ajax({
                url: "admin_update_level.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.href="admin_list_level.php"
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.delete-level').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: "Thông báo xóa loại bằng",
                text: 'Bạn có muốn xóa loại bằng này không?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonText: 'Đồng ý',
            }).then((res) => {
                if(res.isConfirmed){
                    let formData = new FormData();
                    formData.append('id',$(this).attr('data-id'));
                    formData.append('delete',1);
                    $.ajax({
                        url: "admin_list_level.php",
                        method: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            Swal.fire({
                                title: data.title,
                                text: data.text,
                                icon: data.icon
                            }).then((res) => {
                                if(res.isConfirmed){
                                    location.reload();
                                }
                            });
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
        //question
        $('.add-question').on('submit',function(e){
            e.preventDefault();
            // console.log(1);
            let formData = new FormData($(this)[0]);
            formData.append('insert',1);
            $.ajax({
                url: "admin_list_question.php",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.reload();
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.change-question').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('id',$(this).attr('data-id'));
            formData.append('update',1);
            $.ajax({
                url: "admin_update_question.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.href="admin_list_question.php"
                            // location.href=""
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.delete-question').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: "Thông báo xóa câu hỏi",
                text: 'Bạn có muốn xóa câu hỏi này không?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonText: 'Đồng ý',
            }).then((res) => {
                if(res.isConfirmed){
                    let formData = new FormData();
                    formData.append('id',$(this).attr('data-id'));
                    formData.append('delete',1);
                    $.ajax({
                        url: "admin_list_question.php",
                        method: "POST",
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            Swal.fire({
                                title: data.title,
                                text: data.text,
                                icon: data.icon
                            }).then((res) => {
                                if(res.isConfirmed){
                                    location.reload();
                                }
                            });
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
        //assignment
        $('.add-assignment').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            let content = CKEDITOR.instances['ckeditor'].getData();
            if(content){
                formData.append('name',content);
                formData.append('insert',1);
                $.ajax({
                    url: "admin_list_assignment.php",
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data){
                        // console.log(data);
                        Swal.fire({
                            title: data.title,
                            text: data.text,
                            icon: data.icon,
                            confirmButtonText: 'Đồng ý',
                        }).then((res) => {
                            if(res.isConfirmed){
                                location.reload();
                            }
                        });
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            }else{
                Swal.fire({
                    title: 'Thông báo thêm đề bài',
                    text: 'Thiếu nội dung',
                    icon: 'warning',
                    confirmButtonText: 'Đồng ý',
                })
            }
        })
        $('.change-assignment').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('id',$(this).attr('data-id'));
            formData.append('update',1);
            formData.append('name',CKEDITOR.instances['ckeditor'].getData());
            $.ajax({
                url: "admin_update_assignment.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.href="admin_list_assignment.php"
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.delete-assignment').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: "Thông báo xóa đề bài",
                text: 'Bạn có muốn xóa đề bài này không?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonText: 'Đồng ý',
            }).then((res) => {
                if(res.isConfirmed){
                    let formData = new FormData();
                    formData.append('id',$(this).attr('data-id'));
                    formData.append('delete',1);
                    $.ajax({
                        url: "admin_list_assignment.php",
                        method: "POST",
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            Swal.fire({
                                title: data.title,
                                text: data.text,
                                icon: data.icon
                            }).then((res) => {
                                if(res.isConfirmed){
                                    location.href="admin_list_assignment.php"
                                }
                            });
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
        //exam
        $('#duration').on('input', function() { 
            // Lấy giá trị từ thanh trượt
            var durationValue = $(this).val();
            // Cập nhật nội dung của phần tử text-duration
            $('.text-duration').text(`(${durationValue} phút)`);
        });
        $('.add-exam').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('insert',1);
            $.ajax({
                url: "admin_list_exam.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.reload();
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.change-exam').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            formData.append('id',$(this).attr('data-id'));
            formData.append('update',1);
            $.ajax({
                url: "admin_update_exam.php",
                method: "POST",
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data){
                    // console.log(data);
                    Swal.fire({
                        title: data.title,
                        text: data.text,
                        icon: data.icon,
                        confirmButtonText: 'Đồng ý',
                    }).then((res) => {
                        if(res.isConfirmed){
                            location.href="admin_list_exam.php"
                        }
                    });
                },
                error: function(err){
                    console.log(err);
                }
            })
        })
        $('.delete-exam').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: "Thông báo xóa bài thi",
                text: 'Bạn có muốn xóa bài thi này không?',
                icon: 'info',
                showCancelButton: true,
                cancelButtonText: 'Hủy bỏ',
                confirmButtonText: 'Đồng ý',
            }).then((res) => {
                if(res.isConfirmed){
                    let formData = new FormData();
                    formData.append('id',$(this).attr('data-id'));
                    formData.append('delete',1);
                    $.ajax({
                        url: "admin_list_exam.php",
                        method: "POST",
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            Swal.fire({
                                title: data.title,
                                text: data.text,
                                icon: data.icon
                            }).then((res) => {
                                if(res.isConfirmed){
                                    location.reload()
                                }
                            });
                        },
                        error: function(err){
                            console.log(err);
                        }
                    })
                }
            })
        })
    });
</script>