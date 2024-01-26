
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 20) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        // When the user clicks on the button, scroll to the top of the document
        $('#back-to-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 100); // You can adjust the animation speed if needed
            return false;
        });
        var header = $('.bg-header-child');
        var menuHeader = $(".bg-header-child .menu-header");

        $(window).scroll(function () {
            var scrollPosition = $(this).scrollTop();

            // Thay đổi màu sắc khi cuộn
            if (scrollPosition > 0) {
                header.addClass('bg-scroll').removeClass('bg-header');
                menuHeader.css('padding-top','10px');
            } else {
                menuHeader.css('padding-top','20px');
                header.removeClass('bg-scroll').addClass('bg-header');
            }
        });

        $('.input-search').on('change',function(e){
            e.preventDefault();
            let keyword = $(this).val();
            window.location.href = 'luyenthi.php?keyword='+keyword;
        })
        // var hours = 0;
        var minutes = parseInt($('.duration-exam').attr('data-duration'));
        var totalSeconds = minutes * 60;  // Tổng số giây ban đầu
        var timerInterval = setInterval(function() {
            // Chuyển đổi tổng số giây thành giờ, phút và giây
            var hours = Math.floor(totalSeconds / 3600); //floor lam tron xuong
            var minutes = Math.floor((totalSeconds % 3600) / 60); //% chia lay phan du
            // console.log((totalSeconds % 3600));
            var seconds = totalSeconds % 60;

            // Giảm giá trị của tổng số giây
            totalSeconds--;

            // Kiểm tra nếu tổng số giây đã hết
            if (totalSeconds < 0) {
                // Timer has reached 0, you can handle this case as needed
                clearInterval(timerInterval);
                $('#finish-exam').submit();
            }

            // Update the HTML elements with new values
            $('#hours').text(hours.toString().padStart(2, '0'));
            $('#minutes').text(minutes.toString().padStart(2, '0'));
            $('#seconds').text(seconds.toString().padStart(2, '0'));
        }, 1000);
    })
</script>