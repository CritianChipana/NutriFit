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

const NotFavoriteFood = () => {
  return (
    <>
      <h3 className="FavoriteFood-title">Not food found</h3>
      <picture className="notfound__image">
        <img src="https://www.muur.com.mx/images/empty_item.svg" />
      </picture>
    </>
  );
};

const FavoriteFood = () => {
  const [FavoriteFood, setFavoriteFood] = React.useState([]);
  // let idUsuario = document.querySelector("#idUsuario").value;s
  React.useEffect(() => {
    // fetch("../modelo/Comida/favorito.controller.php")
    fetch("../../modelo/Comida/favorito.controller.php")
      .then((data) => data.json())
      .then((FavoriteFood) => {
        setFavoriteFood(FavoriteFood);
      })
      .catch((e) => console.log("Error", e, "vamos a morir"));
  }, []);
  return (
    <>
      <h3 className="FavoriteFood-title">Platos favoritos</h3>
      <section className="FavoriteFood">
        {FavoriteFood.error ? (
          <NotFavoriteFood />
        ) : (
          FavoriteFood.map((food) => (
            <Food
              key={food.id}
              name={food.name}
              id={food.id}
              image={food.image}
            />
          ))
        )}
      </section>
    </>
  );
};

const Main = () => {
  return (
    <>
      <FavoriteFood />
    </>
  );
};
