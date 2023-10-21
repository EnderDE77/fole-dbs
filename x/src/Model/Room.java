
package Model;

public class Room {
    private String TID;
    private String type;
    private String building;
    private int floor;
    private int number;
    private double price;
    private String status;
    private String startDate;
    private String endDate;

    public Room(String TID, String type, String building, int floor, int number, double price, String status, String startDate, String endDate) {
        this.TID = TID;
        this.type = type;
        this.building = building;
        this.floor = floor;
        this.number = number;
        this.price = price;
        this.status = status;
        this.startDate = startDate;
        this.endDate = endDate;
    }

    // Getters for Room class
    public String getTID() {
        return TID;
    }

    public String getType() {
        return type;
    }

    public String getBuilding() {
        return building;
    }

    public int getFloor() {
        return floor;
    }

    public int getNumber() {
        return number;
    }

    public double getPrice() {
        return price;
    }

    public String getStatus() {
        return status;
    }

    public String getStartDate() {
        return startDate;
    }

    public String getEndDate() {
        return endDate;
    }

    // Setters for Room class
    public void setTID(String TID) {
        this.TID = TID;
    }

    public void setType(String type) {
        this.type = type;
    }

    public void setBuilding(String building) {
        this.building = building;
    }

    public void setFloor(int floor) {
        this.floor = floor;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public void setStartDate(String startDate) {
        this.startDate = startDate;
    }

    public void setEndDate(String endDate) {
        this.endDate = endDate;
    }

    @Override
    public String toString() {
        return "Room{" +
                "TID='" + TID + '\'' +
                ", type='" + type + '\'' +
                ", building='" + building + '\'' +
                ", floor=" + floor +
                ", number=" + number +
                ", price=" + price +
                ", status='" + status + '\'' +
                ", startDate='" + startDate + '\'' +
                ", endDate='" + endDate + '\'' +
                '}';
    }
}
