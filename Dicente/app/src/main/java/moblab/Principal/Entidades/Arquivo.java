package moblab.Principal.Entidades;

public class Arquivo {
    private String local,siape,nome;

    public Arquivo(String local, String siape, String nome) {
        this.local = local;
        this.siape = siape;
        this.nome = nome;
    }

    public String getLocal() {
        return local;
    }

    public void setLocal(String local) {
        this.local = local;
    }

    public String getSiape() {
        return siape;
    }

    public void setSiape(String siape) {
        this.siape = siape;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }
}
