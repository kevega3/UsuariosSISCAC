<style>
	@import url('https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i');
html,body{
  margin:0;
  height:120%;
  font-family: 'Josefin Sans', sans-serif;

}
a{
  text-decoration:none
}
.header{
  position:relative;
  overflow:hidden;
  display:flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  align-content: flex-start;
  height:50vw;
  min-height:400px;
  max-height:550px;
  min-width:300px;
  color:#eee;
}
.header:after{
  content:"";
  width:100%;
  height:100%;
  position:absolute;
  bottom:0;
  left:0;
  z-index:-1;
 background: linear-gradient(to bottom, rgba(0,0,0,0.12) 40%,rgba(27,32,48,1) 100%);
}
.header:before{
  content:"";
  width:100%;
  height:200%;
  position:absolute;
  top:0;
  left:0;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0); backface-visibility: hidden;
  scale(1.0, 1.0);
    transform: translateZ(0);
  background:#1B2030 url(https://img.freepik.com/fotos-premium/transformacion-digital-conceptual-era-tecnologica-proxima-generacion_109643-131.jpg?w=900) 50% 0 no-repeat;
  background-size:100%;
  background-attachment:fixed;
  animation: grow 360s  linear 10ms infinite;
  transition:all 0.4s ease-in-out;
  z-index:-2
}
.header a{
	color: #eee;
    font-size: 20px;

}
.menu{
  display:block;
  width:40px;
  height:30px;
  border:2px solid #fff;
  border-radius:3px;
  position:absolute;
  right:20px;
  top:20px;
  text-decoration:none
}
.menu:after{
  content:"";
  display:block;
  width:20px;
  height:3px;
  background:#fff;
  position:absolute;
  margin:0 auto;
  top:5px;
  left:0;
  right:0;
  box-shadow:0 8px, 0 16px
}
.logo{
	border: 2px solid #fff;
    border-radius: 3px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    align-content: center;
    margin: 20px;
    padding: 0px 10px;
    font-weight: 900;
    font-size: 1.1em;
    line-height: 1;
    box-sizing: border-box;
    height: 40px;
    position: absolute;
    left: 0;
}
.sides, .info{
  flex: 0 0 auto;
  width:50%
}
.info{
  width:100%;
  padding:15% 10% 0 10%;
  text-align:center;
  text-shadow:0 2px 3px rgba(0,0,0,0.2)
}
.author{
  display:inline-block;
  width:50px;
  height:50px;
  border-radius:50%;
  background:url('admin/img/simbolo_cac_color.png') center no-repeat;
  background-size:cover;
  box-shadow:0 2px 3px rgba(0,0,0,0.3);
  margin-bottom:3px
}
.info h4, .meta{
  font-size:0.9em
}
.meta{
  font-style:italic;
}
@keyframes grow{
  0% { transform: scale(1) translateY(0px)}
  50% { transform: scale(1.2) translateY(-400px)}
}




</style>

<div class="header">
  <div class="sides">
    <a href="#" class="logo">Comenzar</a>
  </div>
  <!-- <div class="sides"> <a href="#" class="menu"> </a></div> -->
  <div class="info">
  <h4><a href="#category">BIENVENIDO</a></h4>
    <h1>PORTAL PARA GENERAR SU SOLICITUD DE USUARIOS SISCAC</h1>
    <div class="meta">
      <a  href="https://cuentadealtocosto.org/site/" target="_b" class="author"></a><br>
      por <a href="https://cuentadealtocosto.org/site/" target="_b">Cuenta de alto costo</a> en Oct , 2022
    </div>
  </div>
</div>
