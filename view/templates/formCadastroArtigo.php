<form method="post">
                <div class="form-foto">
                    <div class="form-dados">
                        <div>
                            <label for="titulo">Título</label>
                            <input id="titulo" required type="text" name="titulo">
                        </div>

                        <div>
                            <label for="resumo">Resumo do artigo</label>
                            <input id="resumo" required type="text" name="resumo">
                        </div>
<!-- 
                        <div>
                            <label for="img">Imagem</label>
                            <input id="img" required type="file" name="img">
                        </div> -->

                        <div>
                            <select name="tags">
                            <option value="valor1">Valor 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="enviar">
                        <input type="submit" name="envio" value="Enviar">
                    </div>
                    <div class="enviar">
                        <a href="home.php">Voltar</button>
                    </div>
                </div>
            </form>