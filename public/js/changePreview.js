let uploadInput;
let previewOutput;

let changePreview = () => {
    uploadInput.addEventListener('change', (e)=>{
        console.log("changed");
        let reader = new FileReader();
        reader.onload = (event)=>{
            previewOutput.setAttribute('src', event.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
}

try {
    uploadInput = document.querySelector('#inputFile');
    previewOutput = document.querySelector('#preview-output');
    changePreview();
} catch (e) {}




// document.getElementById("image-upload").addEventListener("change", function(e) {
//     let reader = new FileReader();
//     reader.onload = function(event) {
//         document.getElementById("image-preview").setAttribute('src', event.target.result);
//     }
//     reader.readAsDataURL(e.target.files[0]);
// });


