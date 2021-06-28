const Food = ({ id, name, image }) => {
  const handleNavigate = (e) => {
    window.location.replace(`Food/food.php?id=` + id, "_blank");
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
        </div>
      </article>
    </>
  );
};

const NotFoods = () => {
  return (
    <>
      <h3 className="foods-title">Not food found</h3>
      <picture className="notfound__image">
        <img src="https://www.muur.com.mx/images/empty_item.svg" />
      </picture>
    </>
  );
};

const Foods = () => {
  const [foods, setFoods] = React.useState([]);
  React.useEffect(() => {
    fetch("../modelo/Comida/favorito.controller.php")
      .then((data) => data.json())
      .then((foods) => {
        setFoods(foods);
      })
      .catch((e) => console.log("Error", e));
  }, []);
  return (
    <section className="foods">
      <h3 className="foods-title">Favorite Foods</h3>
      {foods.error ? (
        <NotFoods />
      ) : (
        foods.map((food) => (
          <Food
            key={food.id}
            name={food.name}
            id={food.id}
            image={food.image}
          />
        ))
      )}
    </section>
  );
};

const Main = () => {
  return (
    <>
      <Foods />
    </>
  );
};
