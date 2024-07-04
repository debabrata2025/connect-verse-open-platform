const main_story_area = document.querySelector('.main_story_area');
const st = document.querySelectorAll('.st');
const cancelBtn_sss = document.querySelector('.cross_btn_story');
const storyImage = document.querySelector('.sss_im');
const subStoryImg = document.querySelectorAll('.sub_s_img');
const s_name = document.querySelector('.user_name_s');
const substoryuser = document.querySelectorAll('.ppp');
const main_img_area = document.querySelector('.ssss_im');
const sub_img = document.querySelectorAll('.inputmmm');
const progress = document.querySelector('.progess');
const leftBtn = document.querySelector('.l');
const rightBtn = document.querySelector('.r');

let timeout;
let cIndex = 0;

st.forEach((story, index) => {
    story.addEventListener('click', () => {
        clearTimeout(timeout);
        main_story_area.classList.add('active');
        storyImage.src = subStoryImg[index].src;
        s_name.textContent = substoryuser[index].textContent;
        main_img_area.src = sub_img[index].value;
        cIndex = index;

        progress.classList.remove('active'); // Reset the progress bar animation
        void progress.offsetWidth; // Trigger reflow to restart the animation
        progress.classList.add('active'); // Start the progress bar animation

        timeout = setTimeout(() => {
            changeImage(index + 1);
        }, 10000); // 10 seconds
    });
});

function changeImage(index) {
    if (index >= subStoryImg.length) {
        main_story_area.classList.remove('active');
        progress.classList.remove('active'); // Reset the progress bar
        return;
    }

    cIndex = index;
    storyImage.src = subStoryImg[index].src;
    s_name.textContent = substoryuser[index].textContent;
    main_img_area.src = sub_img[index].value;

    progress.classList.remove('active'); // Reset the progress bar animation
    void progress.offsetWidth; // Trigger reflow to restart the animation
    progress.classList.add('active'); // Start the progress bar animation

    timeout = setTimeout(() => {
        changeImage(index + 1);
    }, 10000); // 10 seconds
}

cancelBtn_sss.addEventListener('click', () => {
    main_story_area.classList.remove('active');
    progress.classList.remove('active'); // Reset the progress bar
    clearTimeout(timeout);
});

leftBtn.addEventListener('click', () => {
    if (cIndex > 0) {
        cIndex--;
        storyImage.src = subStoryImg[cIndex].src;
        s_name.textContent = substoryuser[cIndex].textContent;
        main_img_area.src = sub_img[cIndex].value;

        progress.classList.remove('active'); // Reset the progress bar animation
        void progress.offsetWidth; // Trigger reflow to restart the animation
        progress.classList.add('active'); // Start the progress bar animation

        clearTimeout(timeout);
        timeout = setTimeout(() => {
            changeImage(cIndex + 1);
        }, 10000); // 10 seconds
    }
});

rightBtn.addEventListener('click', () => {
    if (cIndex < subStoryImg.length - 1) {
        cIndex++;
        storyImage.src = subStoryImg[cIndex].src;
        s_name.textContent = substoryuser[cIndex].textContent;
        main_img_area.src = sub_img[cIndex].value;

        progress.classList.remove('active'); // Reset the progress bar animation
        void progress.offsetWidth; // Trigger reflow to restart the animation
        progress.classList.add('active'); // Start the progress bar animation

        clearTimeout(timeout);
        timeout = setTimeout(() => {
            changeImage(cIndex + 1);
        }, 10000); // 10 seconds
    }
});
