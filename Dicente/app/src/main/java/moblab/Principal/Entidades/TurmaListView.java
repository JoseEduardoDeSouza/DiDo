package moblab.Principal.Entidades;

public class TurmaListView {
    private String id,ano,curso;

    public TurmaListView(String id, String ano, String curso) {
        this.id = id;
        this.ano = ano;
        this.curso = curso;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getAno() {
        return ano;
    }

    public void setAno(String ano) {
        this.ano = ano;
    }

    public String getCurso() {
        return curso;
    }

    public void setCurso(String curso) {
        this.curso = curso;
    }
}
