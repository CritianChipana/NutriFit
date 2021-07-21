const Food = ({ id, name, image }) => {
  const handleNavigate = (e) => {
    window.location.replace(`food.php?id=` + id, "_blank");
    // window.open(`Food/food.php?id=` + id, "_blank");
  };
  return (
    <>
      <article className="food">
        <picture className="food-image">
          <img src={image} alt={name} />
        </picture>
        <h4 className="food-title">{name}</h4>
        <div className="food-button">
          <a onClick={handleNavigate}>Ver más</a>
          {/* <a  className="favorite-button" onClick={handleNavigate}>Marcar Favorito</a> */}
        </div>
      </article>
    </>
  );
};





























const NotDatosPaciente = () => {
  return (
    <>
      <h3 className="DatosPaciente-title">Not food found</h3>
      <picture className="notfound__image">
        <img src="https://www.muur.com.mx/images/empty_item.svg" />
      </picture>
    </>
  );
};

const DatosPaciente = () => {
  const [DatosPaciente, setDatosPaciente] = React.useState([]);
  let idUsuario = document.querySelector("#idUsuario").value;
  console.log(idUsuario);
  React.useEffect(() => {
    // fetch("../../modelo/Comida/favorito.controller.php")
    fetch(`../../modelo/Perfil/perfil.controller.php?id=${idUsuario}`)
    // fetch(`../../modelo/Perfil/per`)
      .then((data) => data.json())
      .then((DatosPaciente) => {
        setDatosPaciente(DatosPaciente);
      })
      .catch((e) => console.log("Error", e, "vamos a morir"));
      console.log(DatosPaciente)
  }, []);
  return (
    <>
      <h3 className="DatosPaciente-title">Perfil del Usuario</h3>
      <section className="DatosPaciente">
      { 
         
            <div>
              <h2>asdasdasd</h2>

              {/* <p>{ daDatosPacienteto.idhistorial }</p>
              <p>{ daDatosPacienteto.peso }</p>
              <p>{ daDatosPacienteto.altura }</p>
              <p>{ daDatosPacienteto.imc }</p>
              <p>{ daDatosPacienteto.descripcion }</p>
              <p>{ daDatosPacienteto.fecha }</p> */}
             
            </div>

            
          
        
        }
      </section>
    </>
  );
};

const Main = () => {
  return (
    <>
     <h1>Hola</h1>
     <DatosPaciente/>
    </>
  );
};
