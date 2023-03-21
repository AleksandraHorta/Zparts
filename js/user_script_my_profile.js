class Navbar extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `

    <ul>
        <a href="../index.php"><img src="images/Zparts_main2.png" width="290" height="65"></a>
        <li><a href="my_profile.php">My profile</a></li>
        <li><a href="../php/exit.php">Log out</a></li>
        <li><a target="_blank" href="https://www.google.com/maps/dir//zparts.lv,+Augusta+Deglava+iela+102,+Latgales+priek%C5%A1pils%C4%93ta,+R%C4%ABga,+LV-1082/@56.9481517,24.1869895,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46eecf2bf3b2f817:0x56ee5c2a21d55b88!2m2!1d24.1869895!2d56.9481517"> Augusta Deglava iela 102, Rīga </a></li>
        <li><a target="_blank" href="https://www.youtube.com/channel/UC7bS924mRjV5cikECAmdbEQ/featured"> Follow us on Youtube</a></li>
    </ul>

`;
}
}

customElements.define("menu-panel", Navbar);


