package Model;

public class Admin {
    private String TID;
    private String username;
    private String password;
    private String name;
    private String surname;

    // Constructors
    public Admin(String TID, String username, String password, String name, String surname) {
        this.TID = TID;
        this.username = username;
        this.password = password;
        this.name = name;
        this.surname = surname;
    }

    // Getters and Setters
    public String getTID() {
        return TID;
    }

    public void setTID(String TID) {
        this.TID = TID;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }


}
