const Food = ({ id, name, image }) => {
  const handleNavigate = (e) => {
    window.location.replace(`Food/food.php?id=` + id, "_blank");
    // window.open(`Food/food.php?id=` + id, "_blank");
  };
  return (
    <>
      <article class="food">
        <picture class="food-image">
          <img src={image} alt={name} />
        </picture>
        <h4 class="food-title">{name}</h4>
        <div class="food-button">
          <a onClick={handleNavigate}>Ver más</a>
        </div>
      </article>
    </>
  );
};

const Foods = () => {
  const [foods, setFoods] = React.useState([]);
  React.useEffect(() => {
    fetch("../modelo/Comida/comida.controller.php")
      .then((data) => data.json())
      .then((foods) => {
        setFoods(foods);
      })
      .catch((e) => console.log("Error", e));
  }, []);
  console.log(foods);
  return (
    <section class="foods">
      <h3 class="foods-title">Foods</h3>
      {foods.map((food) => (
        <Food key={food.id} name={food.name} id={food.id} image={food.image} />
      ))}
    </section>
  );
};

const Main = () => {
  return (
    <>
      <div className="se">
        <Foods />
      </div>
    </>
  );
};
