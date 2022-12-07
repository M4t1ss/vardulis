import { startOfToday, startOfYesterday } from 'date-fns'
import { getTimezoneOffset } from 'date-fns-tz'

export const getToday = () => {
	let neededOffset = getTimezoneOffset('Europe/Riga')
	let currentOffset = getTimezoneOffset(Intl.DateTimeFormat().resolvedOptions().timeZone)
	let date = new Date()
	let milliseconds = currentOffset - neededOffset
	date.setMilliseconds(date.getMilliseconds() - milliseconds)
	date.setHours(0,0,0,0)
	date.setMilliseconds(date.getMilliseconds() - (neededOffset-currentOffset))
	return date
}
export const getYesterday = () => {
	let today = getToday()
	today.setMilliseconds(today.getMilliseconds() - 86400000)
	return today
}
