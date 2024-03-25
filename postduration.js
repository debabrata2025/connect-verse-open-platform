
// Function to format the date
function formatDate(postTime) {
    // Get the current time in milliseconds since epoch
    var currentTime = new Date().getTime();

    // Convert post time to milliseconds since epoch
    var postTimestamp = postTime;

    // Calculate the time difference in milliseconds
    var timeDiffInMilliseconds = currentTime - postTimestamp;

    // Convert milliseconds to seconds
    var timeDiffInSeconds = Math.floor(timeDiffInMilliseconds / 1000);

    if (timeDiffInSeconds < 60) {
        return 'Just now';
    } else if (timeDiffInSeconds < 3600) {
        var minutes = Math.floor(timeDiffInSeconds / 60);
        return minutes + ' min';
    } else if (timeDiffInSeconds < 86400) {
        var hours = Math.floor(timeDiffInSeconds / 3600);
        return hours + ' h';
    } else if (timeDiffInSeconds < 2592000) {
        var days = Math.floor(timeDiffInSeconds / 86400);
        return days + ' d';
    } else {
        var months = Math.floor(timeDiffInSeconds / (86400 * 30));
        return months + ' mon';
    }
}

// Assuming postTime is obtained from some source in your JavaScript
// var postTime = '2024-03-25 17:15:00'; // Replace this with your actual post time

// // Format the post time and display it
// var formattedDate = ;
// document.getElementById('formattedDate').textContent = formattedDate;

const time_inputs = document.querySelectorAll('.time_inputs');
const get_time_server = document.querySelectorAll('.get_time_server');
const cal_time = document.querySelectorAll('.cal_time');
const q_t_id = document.querySelector('#q_t_id');
const post_a_time = document.querySelectorAll('.ques_time_server');
const ques_time = document.querySelectorAll('.ques_time');

// sending value to php to a hiiden input for question section
q_t_id.value = new Date().getTime();

post_a_time.forEach((item, index) => {
    ques_time[index].innerHTML = formatDate(item.value);
    console.log(item.value);
})

// sending value to php to a hiiden input for ans section
time_inputs.forEach((item)=> {
    item.value = new Date().getTime();
})

get_time_server.forEach((item, index) => {
    cal_time[index].innerHTML = formatDate(item.value);
    // console.log(item.value);
})