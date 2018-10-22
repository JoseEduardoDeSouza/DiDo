package moblab.Principal.Entidades;

/**
 * Created by charles on 15/07/16.
 */
public class ItemListView {

    private String texto;
    private String nome;
    private boolean file = false;
    private String url;

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public ItemListView(String texto, String nome) {
        this.texto = texto;
        this.nome = nome;
    }

    public ItemListView() {
        this.texto = "";
        this.nome = "";
    }

    public boolean isFile() {
        return file;
    }

    public void setFile(boolean file) {
        this.file = file;
    }

    public String getTexto() {
        return texto;
    }

    public void setTexto(String texto) {
        this.texto = texto;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }
}
