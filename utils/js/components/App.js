const Food = ({ id, name, image, estadofav }) => {
  const [favorit, setFavorit] = React.useState(estadofav);

  const handleNavigate = (e) => {
    window.location.replace(`Food/food.php?id=` + id, "_blank");
    // window.open(`Food/food.php?id=` + id, "_blank");
  };
  const handleMarcarFavorito = async (e) => {
    const idjj = {
      id: id,
    };
    const res = await fetch("../modelo/Comida/favorito.controller.php", {
      body: JSON.stringify(idjj),
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
    }).catch((e) => console.log("Error", e));
    const aa = await res.json();

    if (aa.ok) {
      setFavorit(1);
    }
  };
  const handleQuitarFavorito = async (e) => {
    const idjj = {
      id: id,
    };
    const res = await fetch("../modelo/Comida/quitarFavorito.controller.php", {
      body: JSON.stringify(idjj),
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
    }).catch((e) => console.log("Error", e));
    const aa = await res.json();

    if (aa.ok) {
      setFavorit(2);
    }
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
          {favorit == 2 ? (
            <a className="add-favorite-button" onClick={handleMarcarFavorito}>
              Marcar Favorito
            </a>
          ) : (
            <a
              className="delete-favorite-button"
              onClick={handleQuitarFavorito}
            >
              Quitar Favorito
            </a>
          )}
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
  const [food, setFood] = React.useState();
  const [load, setLoad] = React.useState(false);
  const handleChange = (e) => {
    setFood(e.target.value);
    setLoad(true);
  };
  let idUsuario = document.querySelector("#idUsuario").value;
  React.useEffect(() => {
    if (load) {
      fetch("../modelo/Comida/comida.controller.php?food=" + food)
        .then((data) => data.json())
        .then((foods) => {
          setFoods(foods);
        })
        .catch((e) => console.log("Error", e));
    }
  }, [food, load]);

  React.useEffect(() => {
    fetch("../modelo/Comida/comida.controller.php")
      .then((data) => data.json())
      .then((foods) => {
        setFoods(foods);
      })
      .catch((e) => console.log("Error", e));
  }, []);
  return (
    <section className="foods">
      <h3 className="foods-title">Find your foods</h3>
      <div className="form-group">
        <input
          className="form-control"
          type="text"
          name="food"
          onChange={handleChange}
          value={food}
        />
      </div>
      {foods.error ? (
        <NotFoods />
      ) : (
        foods.map((food) => (
          <Food
            key={food.id}
            name={food.name}
            id={food.id}
            image={food.image}
            estadofav={food.estadofav}
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
