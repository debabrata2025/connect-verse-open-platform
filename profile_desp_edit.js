const inputArea = document.querySelector('.des_edit_main');
const remainingText = document.querySelector('.remaining');
const maxChar = 101;

// restrict typing in a range of 101
inputArea.addEventListener('input', () => {
    const textLen = inputArea.value.length;
    remainingText.textContent = maxChar - textLen;
    if((maxChar - textLen)<1){
        remainingText.textContent = '0';
    }
    if(textLen > maxChar){
        inputArea.value = inputArea.value.substring(0, maxChar);
    }
});

//hide text box with cancel btn
description_box = document.querySelector('.des_editor');
const cancelbtn_edit = document.querySelector('.edit_cancel');
cancelbtn_edit.addEventListener('click', () => {
    description_box.classList.remove('active');
})

const saveBtn = document.querySelector('.edit_save');
const description = document.querySelector('.desp_pp');
saveBtn.addEventListener('click', function(){
    description_box.classList.remove('active');
        // Handle unfriend logic here
        let data = {
            despText: inputArea.value,
        };

        fetch('update_desp.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(result => {
            if (result.success) {
                description.textContent = inputArea.value;
            } else {
                console.log("Error in editing");
            }
        })
        .catch(error => console.error('Error:', error));
})