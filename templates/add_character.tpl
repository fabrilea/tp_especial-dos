
{include file="header.tpl"}

     {include file="vue/characters_list.tpl"}

<form id="character-form" action="add" method="POST">
            <div>
                <div>
                    <div>
                        <label>Nombre</label>
                        <input name="name" type="text">
                    </div>
                    <div>
                        <label>Raza</label>
                        <input name="race" type="text">
                    </div>
                    <div>
                        <label>Afiliación</label>
                        <input name="afiliation" type="text">
                    </div>
                </div>

                <div>
                    <div>
                        <label>Representación LGBTQ+</label>
                        <select name="lgbt">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div>
                        <label>Representación Feminista</label>
                        <select name="fem">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div>
                        <label>Universo</label>
                        <select name="universe">
                            <option value="1">Universo 616</option>
                            <option value="2">Paralelo Utópico</option>
                            <option value="3">Universo 19999</option>
                            <option value="4">Universo 65</option>
                            <option value="5">Universo 20080</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit">Guardar</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="js/characters.js"></script>

{include file="footer.tpl"}