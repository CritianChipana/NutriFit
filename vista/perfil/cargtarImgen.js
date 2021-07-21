
let btn_cargar_img = document.getElementById("new-photo");
let img_perfil = document.getElementById("img-perfil");
let btn = document.getElementById("btn");


btn.addEventListener( "click",()=>{
    btn_cargar_img.click()
} )

btn_cargar_img.addEventListener("change",(e) => {

    const file = ( e.target.files[0] );
        if( file !== null ){
            // console.log("entro")
            // console.log(file)
            startUploading( file )

        }

})

const startUploading =async ( file )=>{
        
        const fileUrl = await fileUpload(file);
        img_perfil.setAttribute("src",fileUrl);
        console.log(fileUrl);
    
}


const fileUpload =async ( file )=>{

    const cloudUrl = 'https://api.cloudinary.com/v1_1/dbrnlddba/upload';
    const formData = new FormData();

    formData.append('upload_preset','nutrifit')
    formData.append('file',file)

    try {
        
        const resp = await fetch( cloudUrl,{
            method: 'POST',
            body:formData
        } );

        if( resp.ok ){
            const cloudResp = await resp.json();
            return cloudResp.secure_url;
        }else{
            throw await resp.json();
        }

    } catch (error) {
        console.log(error)
        throw  error;

    }


}