package Model;



public class Student {
    private String TID;
    private String personalNo;
    private String name;
    private String surname;
    private String phoneNo;
    private String email;
    private Room roomId; // Foreign key to Room class

    public Student(String TID, String personalNo, String name, String surname, String phoneNo, String email, Room roomId) {
        this.TID = TID;
        this.personalNo = personalNo;
        this.name = name;
        this.surname = surname;
        this.phoneNo = phoneNo;
        this.email = email;
        this.roomId = roomId;
    }

    // Getters for Student class
    public String getTID() {
        return TID;
    }

    public String getPersonalNo() {
        return personalNo;
    }

    public String getName() {
        return name;
    }

    public String getSurname() {
        return surname;
    }

    public String getPhoneNo() {
        return phoneNo;
    }

    public String getEmail() {
        return email;
    }

    public Room getRoomId() {
        return roomId;
    }

    // Setters for Student class
    public void setTID(String TID) {
        this.TID = TID;
    }

    public void setPersonalNo(String personalNo) {
        this.personalNo = personalNo;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public void setPhoneNo(String phoneNo) {
        this.phoneNo = phoneNo;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setRoomId(Room roomId) {
        this.roomId = roomId;
    }
}
