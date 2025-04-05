function getQueryParams() {
    const params = {};
    const queryString = window.location.search.slice(1); // Remove "?"
    queryString.split("&").forEach(param => {
        const [key, value] = param.split("=");
        params[key] = decodeURIComponent(value);
    });
    return params;
}

function loadReviewDetails() {
    const {title} = getQueryParams();

    // Find the review by title
    const review = reviews.find(review => review.title === title);

    if (!review) {
        document.getElementById("reviewDetailsContainer").innerHTML = "<p>Recenze nenalezena :(</p>";
        return;
    }

    document.getElementById("reviewDetailsContainer").innerHTML = `
        <h1>${review.title}</h1>
        <!--    <img src="resources/${review.image}"  alt=""/>-->
        <img src="https://placehold.co/450x250"  alt=""/>
        <p>${review.text}</p>
  `;
}

window.addEventListener("DOMContentLoaded", loadReviewDetails);