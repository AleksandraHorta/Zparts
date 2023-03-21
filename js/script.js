class Navbar extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `

<div class="nav" id="navbar">

    <div class="user_reg" style="text-align: center">
        <img src="images/favicon.png" width="100" height="95">
    </div>

    <a class="active" href="#">Timetable</a>

    <button class="dropdown-btn">DATABASES &#8595; </button>
    <div class="dropdown-container">
        <a href="#" onclick="maintnanceBase()">Maintnance History</a>
        <a href="#" onclick="carsBase()">Cars</a>
        <a href="#" onclick="usersBase()">Users</a>
        <a href="#" onclick="servicesBase()">Our Services</a>
    </div>
    <a href="pdf.html">PDF</a>
    <a href="statistics.html">Statistics</a>


    <div class="search">
        <input type="text" class="search-input" placeholder="Search" name="search">
        <button class="button">OK</button>
    </div>

    
    <button class="button" onclick="location.href='../php/exit.php';" id="log-out">LOG OUT</button>
    

</div>

`;
}
}

customElements.define("menu-panel", Navbar);