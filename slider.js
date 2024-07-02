const sliderBtns = document.querySelectorAll('.s_icon');
const stories = document.querySelector('.stories');
const maxscroll = stories.scrollWidth - stories.clientWidth;

sliderBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // console.log(btn);
        const direction = btn.id === "prev-slide"? -1 : 1;
        const scrollamount = 200 * direction;
        stories.scrollBy({left: scrollamount, behavior: "smooth"});
    });
});

const handelslideButtons = () => {
    sliderBtns[0].style.display = stories.scrollLeft <= 0 ? "none" : "flex";
    sliderBtns[1].style.display = stories.scrollLeft >= maxscroll ? "none" : "flex";
}

stories.addEventListener('scroll', () => {
    handelslideButtons();
})

//story upload preview
let input_story = document.querySelector('.input_story');
let image_area_story = document.querySelector('.image_area_story');

input_story.addEventListener('change', (e)=> {
    if (e.target.files.length == 0) {
        return 0;
    }
    // Get the selected file
    const selectedFile = e.target.files[0];
    let tempurl = URL.createObjectURL(selectedFile);

    image_area_story.setAttribute("src", tempurl);
    image_area_story.style.objectFit = 'cover';
});