import 'package:flutter/material.dart';
import 'package:medi_healthcare/utils/config.dart';

class AppointmentCard extends StatefulWidget {
  const AppointmentCard({Key? key, required this.doctor, required this.color}) : super(key: key);
  
  final Map<String, dynamic> doctor;
  final Color color;
  @override
  State<AppointmentCard> createState() => _AppointmentCardState();
}

class _AppointmentCardState extends State<AppointmentCard> {
  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      decoration: BoxDecoration(
        color: widget.color,
        borderRadius: BorderRadius.circular(10),
      ),
      child: Material(
        color: Colors.transparent,
        child: Padding(
          padding: const EdgeInsets.all(20),
          child: Column(
            children: [
              Row(
                children: [
                  CircleAvatar(
                    backgroundImage: NetworkImage(
                        "http://10.0.2.2:8000${widget.doctor['doctor_profile']}"), 
                  ),
                const SizedBox(
                    width: 10,
                  ),
                  Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      Text(
                        'Dr. ${widget.doctor['doctor_name']}',
                        style: const TextStyle(color: Colors.white),
                      ),
                     const SizedBox(
                        height: 2,
                      ),
                    Text(
                        widget.doctor['category'],
                        style:const TextStyle(
                          color: Colors.black,
                        ),
                      )
                    ],
                  ),
                ],
              ),
              Config.spaceSmall,
              
              ScheduleCard(
                appointment: widget.doctor['appointments'],
              ),
              Config.spaceSmall,

              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Expanded(
                    child: ElevatedButton(
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Colors.red,
                      ),
                      child: const Text(
                        'Cancel',
                        style: TextStyle(color: Colors.white),
                      ),
                      onPressed: () {},
                    ),
                  ),
                  const SizedBox(
                    width: 20,
                  ),
                  Expanded(
                      child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.blue,
                    ),
                    child: const Text(
                      'Completed',
                      style: TextStyle(color: Colors.white),
                    ),
                    onPressed: () {},
                  ))
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}

// schedule widget

class ScheduleCard extends StatelessWidget {
  const ScheduleCard({Key? key, required this.appointment}) : super(key: key);
  final Map<String, dynamic> appointment;

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        color: Colors.grey,
        borderRadius: BorderRadius.circular(10),
      ),
      width: double.infinity,
      padding: const EdgeInsets.all(20),
      child:  Row(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: <Widget>[
         const Icon(
            Icons.calendar_today,
            color: Colors.white,
            size: 15,
          ),
         const SizedBox(
            width: 5,
          ),
          Text(
            '${appointment ['day']}, ${appointment['date']}',
            style: const TextStyle(
              color: Colors.white,
            ),
          ),
         const SizedBox(
            width: 20,
          ),
        const Icon(
            Icons.access_alarm,
            color: Colors.white,
            size: 17,
          ),
        const SizedBox(
            width: 15,
          ),
          Flexible(
              child: Text(
            appointment['time'],
            style: const TextStyle(color: Colors.white),
          ))
        ],
      ),
    );
  }
}
