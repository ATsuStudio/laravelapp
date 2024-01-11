
const likeBtnRef = document.querySelector('#btn-like');
const post_id = likeBtnRef.getAttribute('post');
const acc_user_id = likeBtnRef.getAttribute('acc_user');
const likesLabelRef = document.querySelector('#likes-count-label');

let _HOST = 'http://127.0.0.1:8000';
let like_action;

likeBtnRef.addEventListener('click', async ()=>{

    if(likeBtnRef.classList.contains('active')){
        likeBtnRef.classList.remove('active');
        likesLabelRef.innerHTML = parseInt(likesLabelRef.innerHTML) - 1;
        like_action = 0;
    }else{
        likeBtnRef.classList.add('active');
        likesLabelRef.innerHTML = parseInt(likesLabelRef.innerHTML) + 1;
        like_action = 1;
    }

    jwt = await getTokenRequest();

    postLikeData(jwt);


})

let getTokenRequest = async ()=>{
    let endpoint = '/api/auth/login';
    let body = {
        "email": "admin@admin.admin",
        "password": "adminadmin"
    }

    let result ={};
    return new Promise((resolve, reject)=>{
        fetch(_HOST+endpoint,{
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                "User-Agent" : "JSClient",
                "Host": _HOST
            },
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


let postLikeData = async ()=>{
    if(jwt.status != 200){
        console.log("Unauthorizated");
        return false;
    }

    let access_token = jwt.content.access_token;
    let endpoint = "/api/posts/" + post_id + "/like";
    let result ={};
    let body ={
        "user_id": parseInt(acc_user_id),
        "action": like_action
    }

    return new Promise((resolve, reject)=>{
        fetch(_HOST+endpoint,{
            method: "POST",
            headers: {
                Accept: "application/json",
                authorization : "bearer " + access_token,
                "Content-Type": "application/json",
                "User-Agent" : "JSClient",
                "Host": _HOST
            },
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