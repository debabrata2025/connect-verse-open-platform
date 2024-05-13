const share = document.querySelectorAll('.share');
const share_image = document.querySelectorAll('.media');

// share_image.forEach(item => {
//     console.log(item.src);
// })

share.forEach((item, index) => {
    item.addEventListener('click', () => {
        if(navigator.share){
            navigator.share({
                title : 'content',
                text : 'connect verse',
                url : share_image[index].src
            }).then(() => console.log('shared'))
            .catch((error) => console.error('error', error))
        }else{
            alert('sorry! your browser not supports');
        }
    });
})