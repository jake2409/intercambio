function carregar(){
    var msg = document.getElementById('msg')
    var img = document.getElementById('imagem')
    var msg1 = document.getElementById('msg1')    
        var data = new Date()
        var hora = data.getHours()
        var min = data.getMinutes()
        msg.innerHTML = `Agora sao ${hora} horas e ${min} minutos`
        if (hora >= 0 && hora < 12){
            msg1.innerHTML = 'Bom Dia!'
            img.src = 'img/manha.png'
            document.body.style.background = '#e5cd9f'
        }else if(hora >= 12 && hora <18){
            msg1.innerHTML = 'Boa Tarde!'
            img.src = 'img/tarde.gif'
            document.body.style.background = '#b9846f'
        }else{
            msg1.innerHTML = 'Boa Noite!'
            img.src ='img/noite.png'
            document.body.style.background = '#515154'
        }
   
}
