
const likeBtnRef = document.querySelector('#btn-like');
const post_id = likeBtnRef.getAttribute('post');
const acc_user_id = likeBtnRef.getAttribute('acc_user');

console.log("post_id: " + post_id);
console.log("acc_user_id: " + acc_user_id);

likeBtnRef.addEventListener('click', async ()=>{

    if(likeBtnRef.classList.contains('active')){
        likeBtnRef.classList.remove('active');
    }else{
        likeBtnRef.classList.add('active');
    }

    console.log( await GetTokenRequest());


})

let GetTokenRequest = async ()=>{
    let login = 'admin@admin.admin';
    let pass = 'admin';
    let host = 'http://127.0.0.1:8000';
    let endpoint = '/api/auth/login';
    let body = {
        email: login,
        password: pass
    }
    let result ={};
    return new Promise((resolve, reject)=>{
        fetch(host+endpoint,{
            method: "GET",
            body: JSON.stringify(body)
        }).then((response) => {
            result.status = response.status;
            if (!response.ok) {
                throw new Error(
                    `HTTP error! status: ${response.status}`
                );
            }
            return response.json();
        })
        .then((content) => {
            result.content = content;
            resolve(result);
        })
        .catch((error) => {
            console.log(error);
            resolve(result);
        });
    })
}


// fetch(`${_SERVER_HOST + Path}`, {
//     method: Type,
//     headers: {
//         authorization: "bearer " + AuthToken,
//         Accept: "application/json",
//         "Content-Type": "application/json",
//     },
//     body: JSON.stringify(Body),
// })
//     .then((response) => {
//         result.status = response.status;
//         if (!response.ok) {
//             throw new Error(
//                 `HTTP error! status: ${response.status}`
//             );
//         }
//         return response.json();
//     })
//     .then((content) => {
//         result.content = content.message;
//         resolve(result);
//     })
//     .catch((error) => {
//         console.log(error);
//         resolve(result);
//     });