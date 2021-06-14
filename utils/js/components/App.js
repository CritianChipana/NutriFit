const Food = ({ id, img, title }) => {
  const handleNavigate = (e) => {
    window.open(`pages/detalleFood.html`, "_blank");
  };
  return (
    <>
      <article class="food">
        <picture class="food-image">
          <img src={img} alt={title} />
        </picture>
        <h4 class="food-title">{title}</h4>
        <div class="food-button">
          <a onClick={handleNavigate}>Ver más</a>
        </div>
      </article>
    </>
  );
};

const Foods = () => {
  React.useEffect(() => {}, []);
  const [products, setProducts] = React.useState([
    {
      id: 1,
      img: "https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2012/01/comida-rapida-casera.jpg",
      title: "Hamburger",
    },
    {
      id: 2,
      img: "https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2012/01/comida-rapida-casera.jpg",
      title: "Hamburger2",
    },
  ]);
  return (
    <section class="foods">
      <h3 class="foods-title">Foods</h3>
      {products.map((product) => (
        <Food
          key={product.id}
          img={product.img}
          title={product.title}
          id={product.id}
        />
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
