    const pcmedia = window.matchMedia('(min-width: 1024px)');
    const tabletmedia = window.matchMedia('(min-width: 768px) and (max-width: 1023px)');
    const phonemedia = window.matchMedia('(min-width: 375px) and (max-width: 767px)');
    const sliderLine = document.querySelector('.games_block_bottom_list');
    var BtnNext = document.getElementById('games_right_arrow');
    var BtnPrew = document.getElementById('games_left_arrow');
    let offset = 0;

    if (pcmedia.matches) {
        function SliderNext() {
        offset = offset += 466;
            if (offset > 0) {
                BtnPrew.style.opacity="1";
            }
            if (offset > 1398) {
                offset = 1864;
                BtnNext.style.opacity="0.5";
            }
            sliderLine.style.left = -offset + 'px';
        }


        function SliderPrev() {
            offset = offset -= 466;
            if (offset < 466) {
                offset = 0;
                BtnPrew.style.opacity="0.5";
            }
            sliderLine.style.left = -offset + 'px';
            if (offset > 0) {
                BtnNext.style.opacity="1";
            }
        }
    } else if (tabletmedia.matches) {
        function SliderNext() {
            offset = offset += 374;
                if (offset > 0) {
                    BtnPrew.style.opacity="1";
                }
                if (offset > 1496) {
                    offset = 1870;
                    BtnNext.style.opacity="0.5";
                }
                sliderLine.style.left = -offset + 'px';
            }
    
    
            function SliderPrev() {
                offset = offset -= 374;
                if (offset < 374) {
                    offset = 0;
                    BtnPrew.style.opacity="0.5";
                }
                sliderLine.style.left = -offset + 'px';
                if (offset > 0) {
                    BtnNext.style.opacity="1";
                }
            }
    } else if (phonemedia.matches) {
        function SliderNext() {
            offset = offset += 355;
                if (offset > 0) {
                    BtnPrew.style.opacity="1";
                }
                if (offset > 1775) {
                    offset = 2130;
                    BtnNext.style.opacity="0.5";
                }
                sliderLine.style.left = -offset + 'px';
            }
    
    
            function SliderPrev() {
                offset = offset -= 355;
                if (offset < 355) {
                    offset = 0;
                    BtnPrew.style.opacity="0.5";
                }
                sliderLine.style.left = -offset + 'px';
                if (offset > 0) {
                    BtnNext.style.opacity="1";
                }
            }
    }

    BtnNext.addEventListener('click', SliderNext);
    BtnPrew.addEventListener('click', SliderPrev);