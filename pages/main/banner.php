
 
    <div class="banner">
        <div class="slideshow">
            <div class="mySlide bg1" style="display: block;">
                <div class="slide-text left5">
                    <h1>RAIDEN SNEAKER</h1>
                    <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm và đang không ngừng phát triển lớn mạnh. </p>
                </div>
            </div>
            <div class="mySlide bg2">
                <div class="slide-text right5">
                    <h1>RAIDEN SNEAKER</h1>
                    <p>Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm và đang không ngừng phát triển lớn mạnh. </p>
                </div>
            </div>
            <a class="prev" onClick="plusSlides(-1)">&#10094;</a>
            <a class="next" onClick="plusSlides(1)">&#10095;</a>
            
            <div style="text-align:center" class="slide-footer">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
            </div>
        </div>
    </div>

<script>
               var sothutu = 1;
        showSlides(sothutu);
    
        function plusSlides(n) {
          showSlides(sothutu += n);
        }
    
        function currentSlide(n) {
          showSlides(sothutu = n);
        }
    
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlide");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {sothutu = 1}    
          if (n < 1) {sothutu = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active1", "");
          }
          slides[sothutu-1].style.display = "block";  
          dots[sothutu-1].className += " active1";
        }
</script>           
                
                
          


