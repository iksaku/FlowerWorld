import {library, dom} from '@fortawesome/fontawesome-svg-core'
import {
    faBars, faCalendarCheck,
    faCheckCircle,
    faEnvelope,
    faMapMarkerAlt,
    faPhone,
    faShoppingBag, faSyncAlt, faTimes,
    faUser
} from '@fortawesome/free-solid-svg-icons'
import {
    faFacebookSquare,
    faInstagramSquare,
    faTwitterSquare,
    faWhatsappSquare
} from "@fortawesome/free-brands-svg-icons";

library.add(
    faFacebookSquare, faWhatsappSquare, faInstagramSquare, faTwitterSquare,
    faMapMarkerAlt, faPhone, faEnvelope,
    faUser, faBars, faShoppingBag,
    faCheckCircle, faTimes, faSyncAlt,
    faCalendarCheck
)

dom.watch()
